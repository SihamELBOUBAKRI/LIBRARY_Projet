import React from 'react';
import CategoriesSidebar from '../components/CategoriesSidebar';
import BookList from '../components/BookList';

const HomePage = () => {
  return (
    <div>
      <CategoriesSidebar/>
      <BookList />
    </div>
  );
};

export default HomePage;
