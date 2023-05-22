document.addEventListener("DOMContentLoaded", () => {
    const dropContainer = document.getElementById("dropContainer");
  
    // Highlight drop area when dragging over it
    dropContainer.addEventListener("dragenter", (e) => {
      e.preventDefault();
    });
  
    // Unhighlight drop area when dragging leaves it
    dropContainer.addEventListener("dragleave", (e) => {
      e.preventDefault();
    });
  
    // Prevent default behavior when dragging over drop area
    dropContainer.addEventListener("dragover", (e) => {
      e.preventDefault();
    });
  
    // Handle dropped files
    dropContainer.addEventListener("drop", (e) => {
      e.preventDefault();
  
      const files = e.dataTransfer.files;
      handleFiles(files);
    });
  
    // Handle selected files from file input
    const fileInput = document.createElement("input");
    fileInput.type = "file";
    fileInput.style.display = "none";
    document.body.appendChild(fileInput);
  
    fileInput.addEventListener("change", () => {
      const files = fileInput.files;
      handleFiles(files);
    });
  
    // Open file input when clicking on the drop area
    dropContainer.addEventListener("click", () => {
      fileInput.click();
    });
  
    // Handle the files (you can modify this function to suit your needs)
    function handleFiles(files) {
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        console.log("File name:", file.name);
        console.log("File size:", file.size);
        console.log("File type:", file.type);
        // Perform additional operations with the file here
      }
    }
  });