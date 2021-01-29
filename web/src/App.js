import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Home from './pages/Home';
import RegisterLogin from './pages/RegisterLogin';
import Dashboard from './pages/Dashboard';

import AppStyles from './App.module.css';
import Game from './pages/Game';

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
          <Route path='/dashboard'>
            <Dashboard />
          </Route>
          <Route path='/game'>
            <Game />
          </Route>
        </Switch>
      </Router>
    </div>
  );
}

export default App;
