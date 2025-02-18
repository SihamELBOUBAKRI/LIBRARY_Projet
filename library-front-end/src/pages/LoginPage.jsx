import React, { useState } from 'react';
import { useDispatch } from 'react-redux';
import { useNavigate } from 'react-router-dom';
import { login } from '../features/auth/authSlice';

const LoginPage = () => {
  const dispatch = useDispatch();
  const navigate = useNavigate();

  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      // Simulate API delay
      await new Promise(resolve => setTimeout(resolve, 500));
      let user;
      if (email === 'admin@example.com' && password === 'admin123') {
        user = { id: 1, name: 'Admin User', role: 'admin', email };
      } else if (email === 'customer@example.com' && password === 'customer123') {
        user = { id: 2, name: 'Customer User', role: 'customer', email };
      } else {
        throw new Error('Invalid credentials');
      }
      dispatch(login(user));
      // Redirect based on user role
      if (user.role === 'admin') {
        navigate('/dashboard');
      } else {
        navigate('/profile');
      }
    } catch (err) {
      setError(err.message);
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
