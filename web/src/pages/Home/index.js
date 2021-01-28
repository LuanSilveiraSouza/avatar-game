import React, { useState, useEffect } from 'react';
import Page from '../../components/Page';

import CharactersImage from '../../assets/characters.png';
import HomeStyles from './Home.module.css';

const Home = () => {
	const [scrollPosition, setScrollPosition] = useState();

	useEffect(() => {
		window.onscroll = () => {
			setScrollPosition(window.pageYOffset);
		};
	}, []);

	return (
		<Page navBarMode={scrollPosition <= 250 ? 'transparent' : 'full'}>
			<img
				className={HomeStyles.banner}
				src={CharactersImage}
				alt='Personagens de Avatar'
			/>

			<div className={HomeStyles.content}>
				<section className={HomeStyles.textSection}>
					<h1>Avatar - The Last Airbender</h1>

					<p align='justify'>
						The series is centered around the journey of 12-year-old
						Aang, the current Avatar and last survivor of his
						nation, the Air Nomads, along with his friends Sokka,
						Katara, and later Toph, as they strive to end the Fire
						Nation's war against the other nations of the world.
					</p>
				</section>

				<section className={HomeStyles.textSection}>
					<h1>The Game</h1>

					<p align='justify'>
						In this adventure/puzzle game, you will answer a series
						of questions that will lead you to a final destiny. Each
						answer will give you points and take you to a diferent
						path, each path will take you to a diferent endin. All
						the points will be credit at the end of the game, so you
						can see your score..
					</p>
				</section>

				<button className={HomeStyles.playButton}>Play</button>
			</div>
		</Page>
	);
};

export default Home;
