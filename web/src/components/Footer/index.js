import React from 'react';

import FooterStyles from './Footer.module.css';

const Footer = () => {
	return (
		<footer className={FooterStyles.container}>
			<h1 className={FooterStyles.title}>Avatar Game</h1>

			<section>
				<p>Desenvolvido por: </p>
				<p>Iris Debastianni de Mello</p>
				<p>Luan da Silveira de Souza</p>
				<p>Raul Tomaz Marques</p>
			</section>
		</footer>
	);
};

export default Footer;
