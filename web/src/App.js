import NavBar from './components/NavBar';
import AppStyles from './App.module.css';

function App() {
  return (
    <div className={AppStyles.pageWrapper}>
      <NavBar />
      <h1>Hello World!!!</h1>
    </div>
  );
}

export default App;
