// Firebase Configuration
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-auth.js";
import { doc, getFirestore, setDoc } from "https://www.gstatic.com/firebasejs/11.0.2/firebase-firestore.js";
import { firebaseConfig } from './firebase-config.js';

// Firebase Config Object
const firebaseConfig = {
  apiKey: "AIzaSyDFIf2vv5BA7IU6iMV8ZpdS6ItyILAv-50",
  authDomain: "lotus-beauty-salon-project.firebaseapp.com",
  projectId: "lotus-beauty-salon-project",
  storageBucket: "lotus-beauty-salon-project.appspot.com",
  messagingSenderId: "984104098784",
  appId: "1:984104098784:web:fbeb138a1cee16194da985"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth();
const db = getFirestore(app);
const provider = new GoogleAuthProvider();

provider.setCustomParameters({
  prompt: "select_account", // Forces user to choose an account
});

// Get the Google Login Button
const googleLoginButton = document.getElementById('googleLoginButton');

// Handle Google Login
googleLoginButton.addEventListener('click', async () => {
  try {
    // Sign in with Google
    const result = await signInWithPopup(auth, provider);
    const user = result.user;
    
    // Store user data in Firestore
    const userRef = doc(db, 'users', user.uid);
    await setDoc(userRef, {
      name: user.displayName,
      email: user.email,
      profilePicture: user.photoURL,
      createdAt: new Date(),
    }, { merge: true }); // Merge ensures no data is overwritten

    console.log('User successfully logged in:', user);
  } catch (error) {
    console.error('Error logging in:', error);
  }
});
