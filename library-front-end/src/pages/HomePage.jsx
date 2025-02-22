// src/pages/HomePage.jsx
import React from 'react';
import UserList from '../components/UserList'; // Import the UserList component

const HomePage = () => {
  return (
    <div>
      <h2>Welcome to the HomePage!</h2>
      <UserList /> {/* Display the user list here */}
    </div>
  );
};

export default HomePage;

