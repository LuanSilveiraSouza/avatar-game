import React, { useState } from 'react';

import FormStyles from './Form.module.css';

const RegisterForm = ({ handleSubmit }) => {
	const [nameInput, setNameInput] = useState('');
	const [passwordInput, setPasswordInput] = useState('');
	const [repeatPasswordInput, setRepeatPasswordInput] = useState('');

	return (
		<form
			className={FormStyles.container}
			onSubmit={(e) => {
                e.preventDefault();
                
				const data = {
					name: nameInput,
					password: passwordInput,
					repeatPassword: repeatPasswordInput,
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

			<label htmlFor='repeatpassword'>Repeat Password</label>
			<input
				type='password'
				name='repeatpassword'
				className={FormStyles.input}
				value={repeatPasswordInput}
				onChange={(event) => setRepeatPasswordInput(event.target.value)}
			/>

			<button type='submit' className={FormStyles.button}>
				Register
			</button>
		</form>
	);
};

export default RegisterForm;
