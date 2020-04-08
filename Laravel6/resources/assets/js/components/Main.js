import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Header from './content/Header';
import Footer from './content/Footer';
import MainContent from './content/MainContent';
import Post from './Posts/Post';
import contactUs from './content/contactUs';
import BlogContent from './content/BlogContent';
import { BrowserRouter , Route } from 'react-router-dom';

class Main extends Component{
  render(){
    return(
     <div>
       <BrowserRouter basename="/blog">
       <div>
        <Header />
        <Route path="/" exact component={MainContent} />
        <Route path="/Post" exact component={Post} />
        <Route path="/BlogContent" exact component={BlogContent} />
        <Route path="/ContactUs" exact component={contactUs} />
        <Footer />
       </div>
       </BrowserRouter>
     </div>
    );
  }
}

export default Main;