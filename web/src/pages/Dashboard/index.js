import React, { useState, useEffect } from 'react';
import { useHistory } from 'react-router-dom';
import Page from '../../components/Page';

import DashboardStyles from './Dashboard.module.css';
import api from '../../services/api';

const Dashboard = () => {
	const [games, setGames] = useState([]);
	const history = useHistory();

	useEffect(() => {
		const getData = async () => {
			const { id } = await JSON.parse(localStorage.getItem('user'));

			const response = await api.get(`/games/${id}`);

			if (response.status === 200) {
				setGames(response.data);
			}
		};

		getData();
	}, []);

	const handleLogout = async () => {
		const response = await api.get('/logout');

		if (response.status === 200) {
			localStorage.removeItem('user');
			history.push('/');
		}
	};

	return (
		<Page>
			<main className={DashboardStyles.container}>
				<div className={DashboardStyles.actions}>
					<button
						className={DashboardStyles.logoutButton}
						onClick={handleLogout}
					>
						Logout
					</button>
					<button
						className={DashboardStyles.logoutButton}
						onClick={() => history.push('/game')}
					>
						New Game
					</button>
				</div>

				<h1 className={DashboardStyles.tableTitle}>Recent Games</h1>
				<table className={DashboardStyles.table}>
					<tr>
						<th>Score</th>
						<th>Destiny</th>
					</tr>
					{games?.map((game) => (
						<tr key={game.id}>
							<td>{game.score}</td>
							<td>{game.destiny_content}</td>
						</tr>
					))}
				</table>
			</main>
		</Page>
	);
};

export default Dashboard;
