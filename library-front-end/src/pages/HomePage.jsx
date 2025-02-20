import React from 'react';
import BookList from './BookList';
import CategoriesSidebar from '../components/CategoriesSidebar';

const HomePage = () => {
  return (
    <div>
      <CategoriesSidebar/>
      <BookList />
    </div>
  );
};

export default HomePage;
