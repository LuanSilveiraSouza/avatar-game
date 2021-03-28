import axios from 'axios';

const api = axios.create({
	baseURL: 'https://cryptic-peak-81275.herokuapp.com/',
});

api.defaults.withCredentials = true;

export default api;
