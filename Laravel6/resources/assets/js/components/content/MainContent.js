import React, {useState} from 'react';
import Image from 'react-bootstrap/Image';
import getPosts from '../hooks/getPosts';
import Carousel from 'react-bootstrap/Carousel';
const MainContent = () => {

  const posts = getPosts('posts');
  const catogries = getPosts('catogries');
  const topPosts = posts.slice(0, 2);
  const tags = getPosts('tags');
  
        return(
          <div>
          <Carousel>
              <Carousel.Item>
                <img className="d-block w-50" src="storage/thumb/corousel.jpg" alt="First slide" style={{height : "300px" , margin:"auto" }} />
                <Carousel.Caption>
                  <h3>First slide label</h3>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </Carousel.Caption>
              </Carousel.Item>
              <Carousel.Item>
                <img className="w-50 d-block" src="storage/thumb/corousel.jpg" alt="Third slide" style={{height : "300px" , margin:"auto" }} />
                <Carousel.Caption>
                  <h3>Second slide label</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </Carousel.Caption>
              </Carousel.Item>
              <Carousel.Item>
                <img className="w-50 d-block" src="storage/thumb/corousel.jpg" alt="Third slide" style={{height : "300px", margin:"auto" }} />
                <Carousel.Caption>
                  <h3>Third slide label</h3>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </Carousel.Caption>
              </Carousel.Item>
            </Carousel>   
            <main className="main-content">
            <div className="section bg-gray">
              <div className="container">
                <div className="row">
      
                  <div className="col-md-8 col-xl-9">
                    <div className="row gap-y">
                    {posts.map((list,index)=>{
                      return(
                        <div className="col-md-6">
                          <div className="card border hover-shadow-6 mb-6 d-block">
                            <a href="#">
                                <Image className="card-image-top" src={"storage/" + list.image} alt="Card image cap" />
                            </a>
                            <div className="p-6 text-center">
                              <p>
                              <a className="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{list.title}</a>
                              </p>
                              <h5 className="mb-0">
                                 <a className="text-dark" href="#">{list.description}</a>
                              </h5>
                            </div>
                          </div>
                        </div>
                      );
                     })}
                    </div>
    
                    {/* <nav className="flexbox mt-30">
                      <a className="btn btn-white disabled"><i className="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                      <a className="btn btn-white" href="#">Older <i className="ti-arrow-right fs-9 ml-4"></i></a>
                    </nav> */}
                  </div>
      
      
      
                  <div className="col-md-4 col-xl-3">
                    <div className="sidebar px-4 py-md-0">
      
                      <h6 className="sidebar-title">Search</h6>
                      <form className="input-group" target="#" method="GET">
                        <input type="text" className="form-control" name="s" placeholder="Search" />
                        <div className="input-group-addon">
                          <span className="input-group-text"><i className="ti-search"></i></span>
                        </div>
                      </form>
                        <br />
            
                      <h6 className="sidebar-title">Categories</h6>
                      <div className="row link-color-default fs-14 lh-24">
                        {catogries.map((list,index)=>{
                          return(
                          <div className="col-6"><a href="#">{list.name}</a></div>
                          );
                        })}
                      </div>
                      <br />
                    
      
                      <h6 className="sidebar-title">Top posts</h6>
                      {topPosts.map((list,index)=>{
                        return(<a className="media text-default align-items-center mb-5" href="blog-single.html">
                           <Image className="rounded w-65px mr-4" src={"storage/" + list.image} />
                           <p className="media-body small-2 lh-4 mb-0">{list.description}</p>
                         </a>);
                      })}
      
                      <br />
      
                      <h6 className="sidebar-title">Tags</h6>
                      <div className="gap-multiline-items-1">
                      {tags.map((list,index)=>{
                         return(<a className="badge badge-secondary" href="#">{list.name}</a>);
                      })}
                      
                      </div>
      
                      <br />
      
                      <h6 className="sidebar-title">About</h6>
                      <p className="small-3">Logo is a responsive, professional, and multipurpose  Software, Startup and Blog. This a Blog developed in the React Js and Laravel</p>
      
      
                    </div>
                  </div>
      
                </div>
              </div>
            </div>
          </main>
    </div>
        );
}

export default MainContent;