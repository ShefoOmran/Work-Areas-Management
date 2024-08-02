// Create a Blob containing the data
const data = JSON.stringify({
  markers: [...], // Array of marker data
  paths: [...],   // Array of path data
  // Add other data properties here
});

const blob = new Blob([data], { type: 'application/json' });

// Create a download link for the user to save the file
const a = document.createElement('a');
a.href = URL.createObjectURL(blob);
a.download = 'network_data.json';
a.textContent = 'Download Network Data';

// Append the link to the document
document.body.appendChild(a);
// Create a Blob containing the data
const data = JSON.stringify({
  markers: [...], // Array of marker data
  paths: [...],   // Array of path data
  // Add other data properties here
});

const blob = new Blob([data], { type: 'application/json' });

// Create a download link for the user to save the file
const a = document.createElement('a');
a.href = URL.createObjectURL(blob);
a.download = 'network_data.json';
a.textContent = 'Download Network Data';

// Append the link to the document
document.body.appendChild(a);
