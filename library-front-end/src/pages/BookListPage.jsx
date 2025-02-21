// src/components/BookList.jsx
import React, { useEffect, useState } from 'react';
import { useLocation } from 'react-router-dom';
import { Card, Button, Container, Row, Col, Spinner, Alert } from 'react-bootstrap';

const BookList = () => {
  const [books, setBooks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');
  const location = useLocation();

  // Extract query parameters from the URL
  const queryParams = new URLSearchParams(location.search);
  const category = queryParams.get('category');
  const searchQuery = queryParams.get('search');

  useEffect(() => {
    const fetchBooks = async () => {
      setLoading(true);
      try {
        let response;
        // If a category is provided, use it as a search query
        if (category) {
          response = await fetch(`https://api.itbook.store/1.0/search/${encodeURIComponent(category)}`);
        } else if (searchQuery) {
          response = await fetch(`https://api.itbook.store/1.0/search/${encodeURIComponent(searchQuery)}`);
        } else {
          // Default: fetch new books
          response = await fetch('https://api.itbook.store/1.0/new');
        }
        if (!response.ok) {
          throw new Error('Error fetching books');
        }
        const data = await response.json();
        // Both endpoints return a 'books' array
        setBooks(data.books);
      } catch (err) {
        setError(err.message);
      }
      setLoading(false);
    };

    fetchBooks();
  }, [category, searchQuery]);

  if (loading) {
    return (
      <Container className="my-4 text-center">
        <Spinner animation="border" />
      </Container>
    );
  }

  if (error) {
    return (
      <Container className="my-4">
        <Alert variant="danger">{error}</Alert>
      </Container>
    );
  }

  return (
    <Container className="my-4">
      <Row>
        {books.map(book => (
          <Col key={book.isbn13} md={4} className="mb-4">
            <Card>
              <Card.Img variant="top" src={book.image} alt={book.title} />
              <Card.Body>
                <Card.Title>{book.title}</Card.Title>
                <Card.Text>{book.subtitle}</Card.Text>
                <Button variant="primary">View Details</Button>
              </Card.Body>
            </Card>
          </Col>
        ))}
      </Row>
    </Container>
  );
};

export default BookList;
