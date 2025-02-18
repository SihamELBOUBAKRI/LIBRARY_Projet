// src/pages/DashboardPage.jsx
import React, { useEffect, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchUsers } from '../features/users/usersSlice';
import { fetchOrders } from '../features/orders/ordersSlice';
import { fetchBooks, addBook, deleteBook } from '../features/books/bookSlice';
import { Container, Row, Col, Table, Button, Form, Modal, Spinner, Alert } from 'react-bootstrap';

const AdminDashboard = () => {
  const dispatch = useDispatch();
  const { users, loading: usersLoading } = useSelector(state => state.users);
  const { orders, loading: ordersLoading } = useSelector(state => state.orders);
  const { books, loading: booksLoading } = useSelector(state => state.books);

  const [showAddModal, setShowAddModal] = useState(false);
  const [newBook, setNewBook] = useState({ title: '', author: '', category: '', price: '', stock: '' });

  useEffect(() => {
    dispatch(fetchUsers());
    dispatch(fetchOrders());
    dispatch(fetchBooks());
  }, [dispatch]);

  const handleAddBook = () => {
    dispatch(addBook(newBook));
    setShowAddModal(false);
    setNewBook({ title: '', author: '', category: '', price: '', stock: '' });
  };

  const handleDeleteBook = (id) => {
    dispatch(deleteBook(id));
  };

  return (
    <Container className="my-4">
      <h2 className="mb-4">📊 Library Dashboard</h2>
      
      {/* Manage Books Section */}
      <Row>
        <Col>
          <h4>📚 Manage Books</h4>
          <Button variant="primary" onClick={() => setShowAddModal(true)}>➕ Add Book</Button>
          {booksLoading ? <Spinner animation="border" className="mx-2" /> : (
            <Table striped bordered hover className="mt-3">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                {books.map((book, index) => (
                  <tr key={book.id}>
                    <td>{index + 1}</td>
                    <td>{book.title}</td>
                    <td>{book.author}</td>
                    <td>{book.category}</td>
                    <td>${book.price}</td>
                    <td>{book.stock}</td>
                    <td>
                      <Button variant="danger" size="sm" onClick={() => handleDeleteBook(book.id)}>🗑 Delete</Button>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          )}
        </Col>
      </Row>

      {/* View Users Section */}
      <Row className="mt-5">
        <Col>
          <h4>👥 All Users</h4>
          {usersLoading ? <Spinner animation="border" /> : (
            <Table striped bordered hover className="mt-3">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                {users.map((user, index) => (
                  <tr key={user.id}>
                    <td>{index + 1}</td>
                    <td>{user.name}</td>
                    <td>{user.email}</td>
                    <td>{user.role}</td>
                  </tr>
                ))}
              </tbody>
            </Table>
          )}
        </Col>
      </Row>

      {/* View Orders Section */}
      <Row className="mt-5">
        <Col>
          <h4>🛒 Orders</h4>
          {ordersLoading ? <Spinner animation="border" /> : (
            <Table striped bordered hover className="mt-3">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Customer</th>
                  <th>Books</th>
                  <th>Total Price</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                {orders.map((order, index) => (
                  <tr key={order.id}>
                    <td>{index + 1}</td>
                    <td>{order.customer_name}</td>
                    <td>{order.books.map(b => b.title).join(', ')}</td>
                    <td>${order.total_price}</td>
                    <td>{order.status}</td>
                  </tr>
                ))}
              </tbody>
            </Table>
          )}
        </Col>
      </Row>

      {/* Add Book Modal */}
      <Modal show={showAddModal} onHide={() => setShowAddModal(false)}>
        <Modal.Header closeButton>
          <Modal.Title>Add New Book</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <Form>
            <Form.Group className="mb-2">
              <Form.Label>Title</Form.Label>
              <Form.Control type="text" value={newBook.title} onChange={e => setNewBook({ ...newBook, title: e.target.value })} />
            </Form.Group>
            <Form.Group className="mb-2">
              <Form.Label>Author</Form.Label>
              <Form.Control type="text" value={newBook.author} onChange={e => setNewBook({ ...newBook, author: e.target.value })} />
            </Form.Group>
            <Form.Group className="mb-2">
              <Form.Label>Category</Form.Label>
              <Form.Control type="text" value={newBook.category} onChange={e => setNewBook({ ...newBook, category: e.target.value })} />
            </Form.Group>
            <Form.Group className="mb-2">
              <Form.Label>Price</Form.Label>
              <Form.Control type="number" value={newBook.price} onChange={e => setNewBook({ ...newBook, price: e.target.value })} />
            </Form.Group>
            <Form.Group className="mb-2">
              <Form.Label>Stock</Form.Label>
              <Form.Control type="number" value={newBook.stock} onChange={e => setNewBook({ ...newBook, stock: e.target.value })} />
            </Form.Group>
          </Form>
        </Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={() => setShowAddModal(false)}>Close</Button>
          <Button variant="primary" onClick={handleAddBook}>Add Book</Button>
        </Modal.Footer>
      </Modal>

    </Container>
  );
};
export default AdminDashboard;
