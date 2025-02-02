/* delete countries popup */

function confirmDelete(countryId) {
    // Show confirmation dialog
    const confirmation = document.createElement("div");
    confirmation.classList.add("confirmation-popup");
    confirmation.innerHTML = `
        <div class="popup-content">
            <h5 class="text-center mb-3">Are you sure you want to delete this country?</h5>
            <p>This action <span class="text-danger">cannot be undone</span>.</p>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success mx-2" onclick="deleteCountry(${countryId})">Yes, Delete</button>
                <button class="btn btn-secondary mx-2" onclick="closeConfirmation()">Cancel</button>
            </div>
        </div>
    `;
    document.body.appendChild(confirmation);
}

function deleteCountry(countryId) {
    // If confirmed, submit the form
    document.getElementById('deleteForm' + countryId).submit();
}

function closeConfirmation() {
    // Close the popup without deleting
    const confirmation = document.querySelector('.confirmation-popup');
    if (confirmation) {
        confirmation.remove();
    }
}

/* delete artists popup */
function confirmDelete(artistId) {
    // Show confirmation dialog
    const confirmation = document.createElement("div");
    confirmation.classList.add("confirmation-popup");
    confirmation.innerHTML = `
        <div class="popup-content">
            <h5 class="text-center mb-3">Are you sure you want to delete this artist?</h5>
            <p>This action <span class="text-danger">cannot be undone</span>.</p>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success mx-2" onclick="deleteArtist(${artistId})">Yes, Delete</button>
                <button class="btn btn-secondary mx-2" onclick="closeConfirmation()">Cancel</button>
            </div>
        </div>
    `;
    document.body.appendChild(confirmation);
}

function deleteArtist(artistId) {
    // If confirmed, submit the form
    document.getElementById('deleteForm' + artistId).submit();
}

function closeConfirmation() {
    // Close the popup without deleting
    const confirmation = document.querySelector('.confirmation-popup');
    if (confirmation) {
        confirmation.remove();
    }
}

/* popup album*/
function confirmDelete(albumId) {
    // Show confirmation dialog
    const confirmation = document.createElement("div");
    confirmation.classList.add("confirmation-popup");
    confirmation.innerHTML = `
        <div class="popup-content">
            <h5 class="text-center mb-3">Are you sure you want to delete this album?</h5>
            <p>This action <span class="text-danger">cannot be undone</span>.</p>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success mx-2" onclick="deleteAlbum(${albumId})">Yes, Delete</button>
                <button class="btn btn-secondary mx-2" onclick="closeConfirmation()">Cancel</button>
            </div>
        </div>
    `;
    document.body.appendChild(confirmation);
}

function deleteAlbum(albumId) {
    // Send AJAX request to delete the album
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "admin_album_delete.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status === 200) {
            // If successful, remove the album row from the table
            var row = document.getElementById('albumRow' + albumId);
            row.parentNode.removeChild(row);

            // Close the confirmation popup
            closeConfirmation();

            // Show success message
            alert("Album deleted successfully!");
        } else {
            alert("Failed to delete the album.");
        }
    };

    xhr.send("album_id=" + albumId);
}

function closeConfirmation() {
    // Close the popup without deleting
    const confirmation = document.querySelector('.confirmation-popup');
    if (confirmation) {
        confirmation.remove();
    }
}
/* popup users*/

function confirmDelete(userId) {
    const confirmation = document.createElement("div");
    confirmation.classList.add("confirmation-popup");
    confirmation.innerHTML = `
        <div class="popup-content">
            <h5 class="text-center mb-3">Are you sure you want to delete this user?</h5>
            <p>This action <span class="text-danger">cannot be undone</span>.</p>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-success mx-2" onclick="deleteUser(${userId})">Yes, Delete</button>
                <button class="btn btn-secondary mx-2" onclick="closeConfirmation()">Cancel</button>
            </div>
        </div>
    `;
    document.body.appendChild(confirmation);
}

function deleteUser(userId) {
    // Send AJAX request to delete the user
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "admin_user_delete.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            // If successful, remove the user row from the table
            var row = document.getElementById('userRow' + userId);
            row.parentNode.removeChild(row);

            // Close the confirmation popup
            closeConfirmation();

            // Show success message (you can adjust this as needed)
            alert("User deleted successfully!");
        } else {
            alert("Failed to delete the user.");
        }
    };

    xhr.send("user_id=" + userId);
}

function closeConfirmation() {
    // Close the popup without deleting
    const confirmation = document.querySelector('.confirmation-popup');
    if (confirmation) {
        confirmation.remove();
    }
}
