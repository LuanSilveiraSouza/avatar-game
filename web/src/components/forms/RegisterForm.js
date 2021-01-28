import React from 'react';

import FormStyles from './Form.module.css';

const RegisterForm = () => {
	return (
		<div className={FormStyles.container}>
			<label htmlFor='name'>Name</label>
            <input type="text" name="name" className={FormStyles.input}/>

			<label htmlFor='password'>Password</label>
            <input type="text" name="password" className={FormStyles.input}/>

            <label htmlFor='repeatpassword'>Repeat Password</label>
            <input type="text" name="repeatpassword" className={FormStyles.input}/>

            <button className={FormStyles.button}>Register</button>
		</div>
	);
};

export default RegisterForm;
