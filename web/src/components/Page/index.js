import React from 'react';
import Footer from '../Footer';
import NavBar from '../NavBar';

const Page = ({ children, navBarMode }) => {
	return (
		<>
			<NavBar mode={navBarMode || ''}/>

            {children}

            <Footer />
		</>
	);
};

export default Page;
