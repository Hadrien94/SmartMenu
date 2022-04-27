import React from 'react';
import Navbar from './components/front/Navbar';
import './App.css';
import Home from './pages/front/Home';
import { BrowserRouter as Router, Switch, Route} from 'react-router-dom';
import Services from './pages/front/Services';
import Products from './pages/front/Products';
import SignUp from './pages/front/SignUp';
import Cards from './components/front/Cards';
import HeroSection from './components/front/HeroSection';
import Footer from './components/front/Footer';
//import Api from './components/front/API';

function App() {
  return (
    <>
      <Router>
        <Navbar/>
          <Switch>
            <Route path='/services' component={Services}/> 
            <Route path='/products' component={Products}/>
            <Route path='/sign-up' component={SignUp}/>
            <Route path='/' exact component={Home}/>
          </Switch>
          <HeroSection/>
          <Cards/>
        <Footer/>
        <SignUp/>
      </Router>
    </>
  );
}

export default App;
