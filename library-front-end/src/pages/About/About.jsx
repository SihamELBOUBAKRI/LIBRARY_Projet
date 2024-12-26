import React from 'react';
import "./About.css";
import aboutImg from "../../images/about-img.jpg";

const About = () => {
  return (
    <section className='about'>
      <div className='container'>
        <div className='section-title'>
          <h2>About</h2>
        </div>

        <div className='about-content grid'>
          <div className='about-img'>
            <img src = {aboutImg} alt = "" />
          </div>
          <div className='about-text'>
            <h2 className='about-title fs-26 ls-1'>About Our store</h2>
            <p className='fs-17'>Dive into a world of stories, knowledge, and inspiration. Our carefully curated collection offers something for every reader—from gripping novels and enlightening biographies to manga, fiction, and more. Explore timeless classics, discover hidden gems, or find your next favorite read.</p>
            <p className='fs-17'>At Our store, we believe every book has the power to transform and inspire. Whether you're here to escape into a new world, learn something new, or shop for the perfect gift, we're here to make your experience unforgettable. Start your literary journey with us today! 📚</p>
          </div> 
        </div>
      </div>
    </section>
  )
}

export default About
