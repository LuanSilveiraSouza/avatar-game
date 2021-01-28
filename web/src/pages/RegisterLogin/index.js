import React, { useState } from 'react';
import Page from '../../components/Page';

import LoginForm from '../../components/forms/LoginForm';
import RegisterForm from '../../components/forms/RegisterForm';

import api from '../../services/api';

import CharactersImg from '../../assets/characters3.jpg';
import RegisterLoginStyles from './RegisterLogin.module.css';

const RegisterLogin = () => {
	const [activeTab, setActiveTab] = useState('login');

	const handleSubmit = async (data) => {
		let response;
		if (activeTab === 'login') {
			try {
				response = await api.post('/login', data);

				if (response?.status === 200) {
                    alert('Logged');
				} else {
					alert('Error in login. Try again.');
				}
			} catch (error) {
				alert('Error in login. Try again.');
			}
		} else if (activeTab === 'register') {
			if (data?.password === data?.repeatPassword) {
				try {
					response = await api.post('/users', {
						name: data.name,
						password: data.password,
						role: 'user',
					});

					if (response?.status === 201) {
						alert('Successfully registered!');
						setActiveTab('login');
					} else {
						alert('Error in registering. Try again.');
					}
				} catch (error) {
					alert('Error in registering. Try again.');
				}
			}
		}
	};

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
							Register
						</button>
					</div>

					{activeTab === 'login' ? (
						<LoginForm handleSubmit={handleSubmit} />
					) : (
						<RegisterForm handleSubmit={handleSubmit} />
					)}
				</section>
			</main>
		</Page>
	);
};

export default RegisterLogin;
