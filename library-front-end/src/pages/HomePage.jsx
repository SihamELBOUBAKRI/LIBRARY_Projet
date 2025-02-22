import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchBooksToSell } from '../features/book_to_sell/book_to_sellSlice';

const HomePage = () => {
  const dispatch = useDispatch();

  // Ensure book_to_sell exists in Redux state
  const bookToSellState = useSelector((state) => state.book_to_sell || { books: [], loading: false, error: null });

  const { books, loading, error } = bookToSellState;

  useEffect(() => {
    dispatch(fetchBooksToSell());
  }, [dispatch]);

  return (
    <div>
      <h2>Welcome to the HomePage!</h2>
      {loading && <p>Loading books...</p>}
      {error && <p>Error: {error}</p>}
      {!loading && !error && books.length === 0 && <p>No books available for sale.</p>}
      <ul>
        {books.map((book) => (
          <li key={book.id}>{book.title} - ${book.price}</li>
        ))}
      </ul>
    </div>
  );
};

export default HomePage;
