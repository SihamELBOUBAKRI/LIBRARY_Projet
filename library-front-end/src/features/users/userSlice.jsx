import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';

<<<<<<< HEAD:library-front-end/src/features/users/userSlice.jsx
// Async Thunk to Fetch Users
export const fetchUsers = createAsyncThunk("users/fetchUsers", async () => {
  const response = await axios.get("http://127.0.0.1:8000/api/users");
  return response.data;
});

const usersSlice = createSlice({
  name: "users",
  initialState: { users: [], loading: false, error: null },
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(fetchUsers.pending, (state) => {
        state.loading = true;
      })
      .addCase(fetchUsers.fulfilled, (state, action) => {
        state.loading = false;
        state.users = action.payload;
      })
      .addCase(fetchUsers.rejected, (state, action) => {
        state.loading = false;
        state.error = action.error.message;
      });
  },
=======
export const fetchUsers = createAsyncThunk('users/fetchUsers', async () => {
    const response = await fetch('http://localhost:8000/api/users');
    if (!response.ok) throw new Error('Failed to fetch users');
    return response.json();
});

const usersSlice = createSlice({
    name: 'users',
    initialState: {
        users: [],
        loading: false,
        error: null,
    },
    reducers: {},
    extraReducers: (builder) => {
        builder
            .addCase(fetchUsers.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(fetchUsers.fulfilled, (state, action) => {
                state.loading = false;
                state.users = action.payload;
            })
            .addCase(fetchUsers.rejected, (state, action) => {
                state.loading = false;
                state.error = action.error.message;
            });
    },
>>>>>>> 2c7ad79ec5e69b387d4f66cdc52209bc404490e7:library-front-end/src/features/users/usersSlice.jsx
});

// Export reducer
export default usersSlice.reducer;

