import React , {Component} from "react";
class Footer extends Component {


    
    render(){
        return(
            <footer className="footer">
                  <div className="container">
                    <div className="row gap-y align-items-center">
            
                      <div className="col-6 col-lg-3">
                        {/* <a href="../index.html"><img src="storage/thumb/logo-dark.png" alt="logo" /></a> */}
                        <h2 style={{color : "rgba(0,0,0,0.9)" }}>LOGO</h2>
                      </div>
            
                      <div className="col-6 col-lg-3 text-right order-lg-last">
                        <div className="social">
                          <a className="social-facebook" href="https://www.facebook.com/thethemeio"><i className="fa fa-facebook"></i></a>
                          <a className="social-twitter" href="https://twitter.com/thethemeio"><i className="fa fa-twitter"></i></a>
                          <a className="social-instagram" href="https://www.instagram.com/thethemeio/"><i className="fa fa-instagram"></i></a>
                          <a className="social-dribbble" href="https://dribbble.com/thethemeio"><i className="fa fa-dribbble"></i></a>
                        </div>
                      </div>
            
                      <div className="col-lg-6">
                        <div className="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                          <a className="nav-link" href="../uikit/index.html">Elements</a>
                          <a className="nav-link" href="../block/index.html">Blocks</a>
                          <a className="nav-link" href="../page/about-1.html">About</a>
                          <a className="nav-link" href="../blog/grid.html">Blog</a>
                          <a className="nav-link" href="../page/contact-1.html">Contact</a>
                        </div>
                      </div>
            
                    </div>
                  </div>
                </footer>
            
                );
    }
}

export default Footer;