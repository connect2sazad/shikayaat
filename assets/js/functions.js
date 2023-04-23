function formatDate(dateString) {
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  
    const date = new Date(dateString);
    const monthIndex = date.getMonth();
    const day = date.getDate();
    const year = date.getFullYear();
    let hours = date.getHours();
    const minutes = date.getMinutes();
    const ampm = hours >= 12 ? 'PM' : 'AM';
  
    // Convert from 24-hour time to 12-hour time
    hours = hours % 12;
    hours = hours ? hours : 12;
  
    const formattedDate = `${months[monthIndex]} ${day}, ${year} ${hours}:${minutes.toString().padStart(2, '0')} ${ampm}`;
  
    return formattedDate;
  }