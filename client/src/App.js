import React from 'react';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom'
import './App.css';




import ResultPage from './views/ResultPage';
import HomePage from './views/Homepage';

function App() {
  return (
    <Router>
      <Switch>
        <Route exact path="/" component={HomePage} />
        <Route exact path="/:email" component={ResultPage} />
      </Switch>
    </Router>
  );
}

export default App;
