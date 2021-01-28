import React, { useState } from 'react';
import Page from '../../components/Page';

import CharactersImg from '../../assets/characters3.jpg';
import RegisterLoginStyles from './RegisterLogin.module.css';
import LoginForm from '../../components/forms/LoginForm';
import RegisterForm from '../../components/forms/RegisterForm';

const RegisterLogin = () => {
	const [activeTab, setActiveTab] = useState('login');

	return (
		<Page>
			<main className={RegisterLoginStyles.container}>
				<section>
					<img src={CharactersImg} alt='Personagens de Avatar' />
				</section>
				<section className={RegisterLoginStyles.form}>
					<div className={RegisterLoginStyles.tabs}>
						<button
							className={
								activeTab === 'login'
									? RegisterLoginStyles.tabButtonActive
									: RegisterLoginStyles.tabButton
							}
							onClick={() => setActiveTab('login')}
						>
							Login
						</button>
						<button
							className={
								activeTab === 'register'
									? RegisterLoginStyles.tabButtonActive
									: RegisterLoginStyles.tabButton
							}
							onClick={() => setActiveTab('register')}
						>
							Registro
						</button>
					</div>

					{activeTab === 'login' ? <LoginForm /> : <RegisterForm />}
				</section>
			</main>
		</Page>
	);
};

export default RegisterLogin;
