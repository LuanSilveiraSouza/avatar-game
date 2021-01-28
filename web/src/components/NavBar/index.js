import React, { useState, useEffect } from 'react';
import { useHistory } from 'react-router-dom';

import NavBarStyles from './NavBar.module.css';

const NavBar = ({ mode }) => {
	const history = useHistory();
	const [containerStyle, setContainerStyle] = useState('');

	useEffect(() => {
		setContainerStyle(
			`${NavBarStyles.container} ${NavBarStyles.containerFull}`
		);
		if (mode) {
			if (mode === 'transparent') {
				setContainerStyle(
					`${NavBarStyles.container} ${NavBarStyles.containerTransparent}`
				);
			}
		}
	}, [mode]);

	return (
		<nav
			className={containerStyle}
		>
			<h1 className={NavBarStyles.title}>Avatar Game</h1>

			<section className={NavBarStyles.navLinks}>
				<button
					className={NavBarStyles.navButton}
					onClick={() => history.push('/')}
				>
					Home
				</button>
				<button
					className={NavBarStyles.navButton}
					onClick={() => history.push('/login')}
				>
					Register/Login
				</button>
			</section>
		</nav>
	);
};

export default NavBar;
