import React from 'react';
import Page from '../../components/Page';

import GameStyles from '../Game/Game.module.css';

const Glossary = () => {
	return (
		<Page>
			<main className={GameStyles.container}>
				<h1>Glossary</h1>

				<ul>
					<li>GAME - An amusement or pastime.</li>
					<li>
						ANSWER - A spoken or written reply or response to a
						question.
					</li>
					<li>DIFFERENT - Not identical, separate or distinct.</li>
					<li>
						LAST - Occurring or coming after all others, as in time,
						order, or place.
					</li>
					<li>
						NATION - A large body of people, associated with a
						particular territory, that is sufficiently conscious of
						its unity to seek or to possess a government peculiarly
						its own.
					</li>
					<li>PATH - A course of action, conduct, or procedure.</li>
					<li>ADVENTURE - An exciting or very unusual experience.</li>
					<li>CENTERED - Having a central axis.</li>
					<li>
						DESTINY - Something that is to happen or has happened to
						a particular person or thing; lot or fortune.
					</li>
					<li>CURRENT - Passing in time; belonging to the time actually passing.</li>
					<li>ELEMENT - A natural habitat, sphere of activity, environment.</li>
					<li>FRIENDS - A person attached to another by feelings of affection or personal regard.</li>
					<li>JOURNEY - Traveling from one place to another, usually taking a rather long time, trip.</li>
					<li>PUZZLE - A toy, problem, or other contrivance designed to amuse by presenting difficulties
to be solved by ingenuity or patient effort.</li>
					<li>SURVIVOR - A person or thing that survives.</li>
					<li>WORLD - The earth or globe, considered as a planet.</li>
					<li>YEAR - The time in which any planet completes a revolution round the sun.</li>
					<li>STRIVE - To exert oneself vigorously, try hard.</li>
					<li>END - A point, line, or limitation that indicates the full extent, degree, etc., of something,
limit, bounds.</li>
					<li>STRANGE - Unusual, extraordinary, or curious, odd.</li>
					<li>CREATURE - An animal, especially a nonhuman.</li>
					<li>NOISE - A sound of any kind.</li>
					<li>SERENITY - The state or quality of being serene, calm, or tranquil; sereneness</li>
					<li>HIDING - Act of concealing; concealment.</li>
					<li>EATING - The act of a person or thing that eats</li>
					<li>APPEARS - To come into sight; become visible.</li>
				</ul>
                <p>Dictionary used: https://www.dictionary.com/ </p>
			</main>
		</Page>
	);
};

export default Glossary;
