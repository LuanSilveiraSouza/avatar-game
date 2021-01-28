import React, { useState } from 'react';

import FormStyles from './Form.module.css';

const LoginForm = ({ handleSubmit }) => {
	const [nameInput, setNameInput] = useState('');
	const [passwordInput, setPasswordInput] = useState('');

	return (
		<form
			className={FormStyles.container}
			onSubmit={(e) => {
				e.preventDefault();
				
				const data = {
					name: nameInput,
					password: passwordInput,
				};

				handleSubmit(data);
			}}
		>
			<label htmlFor='name'>Name</label>
			<input
				type='text'
				name='name'
				className={FormStyles.input}
				value={nameInput}
				onChange={(event) => setNameInput(event.target.value)}
			/>

			<label htmlFor='password'>Password</label>
			<input
				type='password'
				name='password'
				className={FormStyles.input}
				value={passwordInput}
				onChange={(event) => setPasswordInput(event.target.value)}
			/>

			<button type='submit' className={FormStyles.button}>
				Login
			</button>
		</form>
	);
};

export default LoginForm;
