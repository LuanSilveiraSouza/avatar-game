import React, { useState, useEffect } from 'react';
import { useHistory } from 'react-router-dom';
import Page from '../../components/Page';

import api from '../../services/api';
import CharactersImg from '../../assets/characters2.jpg';
import GameStyles from './Game.module.css';

const Game = () => {
	const [questions, setQuestions] = useState([]);
	const [questionIndex, setQuestionIndex] = useState();
	const [score, setScore] = useState(0);

	const history = useHistory();

	useEffect(() => {
		const getData = async () => {
			const response = await api.get('/questions');

			if (response.status === 200) {
				const questionsWithChoices = await Promise.all(
					response.data
						.sort((a, b) => a.position - b.position)
						.map(async (question) => {
							const choices = await api.get(
								`/choices/${question.id}`
							);

							if (choices.status === 200) {
								return { ...question, choices: choices.data };
							}
							return;
						})
				);

				setQuestions(questionsWithChoices);
				setQuestionIndex(0);
			}
		};

		getData();
	}, []);

	const handleSubmit = async () => {
		if (questionIndex >= questions.length) {
			const response = await api.get(`/destinies/${score}`);

			if (response.status === 200) {
				alert(`Score: ${score} \nDestiny: ${response.data?.content}`);
			}

			setQuestionIndex(0);
			setScore(0);
		}
	};

	useEffect(() => {
		handleSubmit();
	}, [questionIndex]);

	const handleOption = async (scoreInput = 0) => {
		setScore(score + scoreInput);
		setQuestionIndex(questionIndex + 1);
	};

	return (
		<Page>
			<main className={GameStyles.container}>
				<img
					className={GameStyles.image}
					src={CharactersImg}
					alt='Personagens de Avatar'
				/>

				<section className={GameStyles.question}>
					<h1 className={GameStyles.title}>
						{questions[questionIndex]?.content ||
							'Which element do you bend?'}
					</h1>

					<div className={GameStyles.options}>
						{questions[questionIndex]?.choices?.map((choice) => (
							<button
								key={choice.id}
								className={GameStyles.optionsButton}
								onClick={() => handleOption(choice.points)}
							>
								{choice.content}
							</button>
						))}
					</div>
				</section>
			</main>
		</Page>
	);
};

export default Game;
