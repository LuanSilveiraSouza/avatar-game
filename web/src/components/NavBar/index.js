import React from 'react';

import NavBarStyles from './NavBar.module.css';

const NavBar = () => {
	return (
		<div className={NavBarStyles.container}>
			<h1 className={NavBarStyles.title}>Avatar Game</h1>

            <div className={NavBarStyles.navLinks}>
                <button className={NavBarStyles.navButton}>Home</button>
                <button className={NavBarStyles.navButton}>Register/Login</button>
            </div>
		</div>
	);
};

export default NavBar;
