// src/App.jsx
import React from 'react';
import { Routes, Route } from 'react-router-dom';
import HomePage from './pages/HomePage';
import LoginPage from './pages/LoginPage';
import SignUpPage from './pages/SignUpPage';
<<<<<<< HEAD
import ProfilePage from './components/Profile';
import AdminDashboard from './pages/AdminDashboard';
import WishlistPage from './components/Wishlist';
import BookList from './pages/BookListPage';
import AuthorsList from './pages/AuthorsListPage';

=======
import AdminDashboard from './pages/AdminDashboard';
>>>>>>> 2c7ad79ec5e69b387d4f66cdc52209bc404490e7
import Navbar from './components/Navbar';
import Profile from './components/Profile';
import BookList from './components/BookList';
import AuthorsList from './components/AuthorsList';
import Wishlist from './components/Wishlist';

function App() {
  return (
    <>
      <Navbar />
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/login" element={<LoginPage />} />
        <Route path="/signup" element={<SignUpPage />} />
        <Route path="/profile" element={<Profile />} />
        <Route path="/dashboard" element={<AdminDashboard />} />
        <Route path="/wishlist" element={<Wishlist />} />
        <Route path="/books" element={<BookList />} />
        <Route path="/authors" element={<AuthorsList />} />
      </Routes>
    </>
  );
}

export default App;
