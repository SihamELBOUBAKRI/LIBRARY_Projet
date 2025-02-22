// src/axios.js
import axios from 'axios';
import { useNavigate } from 'react-router-dom'; // For redirecting on 401

// Create an Axios instance
const axiosInstance = axios.create({
  baseURL: 'http://localhost:8000/api', // Your Laravel API base URL
  headers: {
    'Content-Type': 'application/json',
  },
});

// Request interceptor
axiosInstance.interceptors.request.use(
  (config) => {
    // Add authorization token (if available) to every request
    const token = localStorage.getItem('token'); // Example: Get token from localStorage
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

// Response interceptor
axiosInstance.interceptors.response.use(
  (response) => {
    // Handle successful responses
    return response.data; // Return only the data from the response
  },
  (error) => {
    // Handle errors globally
    if (error.response) {
      // The request was made and the server responded with a status code
      switch (error.response.status) {
        case 401:
          // Unauthorized: Redirect to login or refresh token
          console.error('Unauthorized: Redirecting to login...');
          localStorage.removeItem('token'); // Clear the token
          window.location.href = '/login'; // Redirect to login page
          break;
        case 404:
          console.error('Resource not found');
          break;
        case 500:
          console.error('Server error');
          break;
        default:
          console.error('An error occurred:', error.response.data);
      }
    } else if (error.request) {
      // The request was made but no response was received
      console.error('No response received:', error.request);
    } else {
      // Something happened in setting up the request
      console.error('Request setup error:', error.message);
    }
    return Promise.reject(error.response?.data?.message || 'An error occurred');
  }
);

export default axiosInstance;