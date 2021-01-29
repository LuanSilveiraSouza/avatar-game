import React from 'react';
import Page from '../../components/Page';

import CharactersImg from '../../assets/characters2.jpg';
import GameStyles from './Game.module.css';

const Game = () => {
    return (<Page>
        <main className={GameStyles.container}>
            <img className={GameStyles.image} src={CharactersImg} alt="Personagens de Avatar"/>

            <section className={GameStyles.question}>
                <h1 className={GameStyles.title}>Which element do you bend?</h1>

                <div className={GameStyles.options}>
                    <button className={GameStyles.optionsButton}>1</button>
                    <button className={GameStyles.optionsButton}>2</button>
                    <button className={GameStyles.optionsButton}>3</button>
                </div>
            </section>
        </main>
    </Page>);
}

export default Game;