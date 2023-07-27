function openNav(){
    var sidebar = document.getElementById("mySidebar");
    
    // Check if the sidebar is currently active
  if (sidebar.classList.contains("active")) {
    sidebar.classList.remove("active");
  } else {
    sidebar.classList.add("active");
  }
}
