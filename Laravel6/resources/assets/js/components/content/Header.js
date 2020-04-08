import React, { useState} from 'react';
import { Link } from "react-router-dom";
// import Image from 'react-bootstrap/Image';
const Header = () => {
  
  const [resource, setResource] = useState('posts');
  
    return(
      <div>
        <p>{resource}</p>
          <nav className="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky" style={{background : "rgba(0,0,0,0.9)" }}>
            <div className="container">
                  <div className="navbar-left">
                  <button className="navbar-toggler" type="button">&#9776;</button>
                  <a href="/blog" className="navbar-brand"><h2 style={{color : "white" }}>LOGO</h2></a>
                  {/* <Link to="/blog/" className="navbar-brand" ><h2 style={{color : "white" }}>LOGO</h2></Link> */}
                  </div>
              <section className="navbar-mobile">
                <span className="navbar-divider d-mobile-none"></span>
      
                <ul className="nav nav-navbar">
                  <li className="nav-item">
                    <Link className="nav-link" to="/post">Posts</Link>
                  </li>
      
                  <li className="nav-item">
                    <Link className="nav-link" to="/BlogContent">Blog </Link>
                  </li>
                  
                  <li className="nav-item">
                    {/* <a className="nav-link" href="#">About Us <span className="arrow"></span></a> */}
                    <Link to="/blog/about" className="nav-link" >About Us <span className="arrow"></span></Link>
                    <ul className="nav">
      
                      <li className="nav-item">
                        <Link className="nav-link" to="/ContactUs">Contact</Link>
                      </li>
      
                      <li className="nav-divider"></li>
      
                      <li className="nav-item">
                        <a className="nav-link" href="#">Extra <span className="arrow"></span></a>
                        <nav className="nav">
                          <Link className="nav-link" to="#">Coming soon</Link>
                          <Link className="nav-link" to="#">Terms</Link>
                          <Link className="nav-link" to="#">Error 404</Link>
                        </nav>
                      </li>
                   
                    </ul>
                  </li>
      
                </ul>
              </section>
      
      
            </div>
          </nav>
    
          </div>
          ); 
}

export default Header;