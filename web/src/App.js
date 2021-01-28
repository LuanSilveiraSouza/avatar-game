import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Home from './pages/Home';
import RegisterLogin from './pages/RegisterLogin';
import AppStyles from './App.module.css';

function App() {
  return (
    <div className={AppStyles.pageWrapper}>
      <Router>
        <Switch>
          <Route path='/' exact>
            <Home />
          </Route>
          <Route path='/login'>
            <RegisterLogin />
          </Route>
        </Switch>
      </Router>
    </div>
  );
}

export default App;
