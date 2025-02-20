import React, { useState } from 'react';
import { useDispatch } from 'react-redux';
import { useNavigate } from 'react-router-dom';
import { login } from '../features/auth/authSlice';
import axios from 'axios';  // Import axios for API requests

const LoginPage = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      // Make the API request to check if the user exists
      const response = await axios.post('http://your-backend-api-url/login', { email, password });

      if (response.data && response.data.user) {
        const user = response.data.user;
        dispatch(login(user)); // Dispatch the user to the Redux store

        // Redirect based on the user role
        if (user.role === 'admin') {
          navigate('/dashboard');
        } else if (user.role === 'customer') {
          navigate('/customer-dashboard');
        }
      } else {
        throw new Error('Invalid credentials');
      }
    } catch (err) {
      setError(err.response?.data?.message || err.message || 'An error occurred');
    }
  };

  return (
    <div className="container my-4">
      <h2>Login</h2>
      {error && <div className="alert alert-danger">{error}</div>}
      <form onSubmit={handleSubmit}>
        <div className="mb-3">
          <label>Email:</label>
          <input 
            type="email" 
            className="form-control" 
            value={email} 
            onChange={(e) => setEmail(e.target.value)} 
            required 
          />
        </div>
        <div className="mb-3">
          <label>Password:</label>
          <input 
            type="password" 
            className="form-control" 
            value={password} 
            onChange={(e) => setPassword(e.target.value)} 
            required 
          />
        </div>
        <button type="submit" className="btn btn-primary">Login</button>
      </form>
    </div>
  );
};

export default LoginPage;
