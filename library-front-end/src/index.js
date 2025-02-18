import React from 'react';
import { Provider } from 'react-redux';
import authReducer from './features/auth/authSlice';
import bookReducer from './features/books/bookSlice';
import cartReducer from './features/cart/cartSlice';
import usersReducer from './features/users/usersSlice';
import ordersReducer from './features/orders/ordersSlice';
import wishlistReducer from './features/wishlist/wishlistSlice';
import categoryReducer from './features/categories/categorySlice';
import { configureStore } from '@reduxjs/toolkit';
import ReactDOM from 'react-dom/client';
import './index.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import App from './App';
import { BrowserRouter } from 'react-router-dom';

const store = configureStore({
    reducer: {
      auth: authReducer,
      books: bookReducer,
      cart: cartReducer,
      wishlist: wishlistReducer,
      categories: categoryReducer,
      users: usersReducer,
      orders: ordersReducer,
    },
  });

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Provider store={store}>
      <BrowserRouter>
        <App />
      </BrowserRouter>
    </Provider> 
  </React.StrictMode>
);

