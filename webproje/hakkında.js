document.getElementById('searchButton').addEventListener('click', () => {
    const trackName = document.getElementById('trackInput').value;
    if (trackName) {
      searchTrack(trackName);
    } else {
      alert('Lütfen bir şarkı adı girin.');
    }
  });
  
  function searchTrack(trackName) {
    const url = `https://musicbrainz.org/ws/2/recording/?query=recording:${trackName}&fmt=json`;
  
    fetch(url)
      .then(response => response.json())
      .then(data => {
        displayResults(data.recordings);
      })
      .catch(error => console.error('Error:', error));
  }
  
  function displayResults(recordings) {
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = '';
  
    if (recordings.length === 0) {
      resultsDiv.innerHTML = '<p>Şarkı bulunamadı.</p>';
      return;
    }
  
    recordings.forEach(recording => {
      const recordingDiv = document.createElement('div');
      recordingDiv.className = 'recording';
      const artistNames = recording['artist-credit'].map(artist => artist.name).join(', ');
      const youtubeSearchUrl = `https://www.youtube.com/results?search_query=${encodeURIComponent(recording.title + ' ' + artistNames)}`;
      
      recordingDiv.innerHTML = `
        <h2>${recording.title}</h2>
        <p>Artist: ${artistNames}</p>
        <p>Release Date: ${recording['first-release-date'] || 'N/A'}</p>
        <a href="${youtubeSearchUrl}" target="_blank"> ${artistNames} ${recording.title} </a>
        <p>MBID: ${recording.id}</p> 
      `;
      resultsDiv.appendChild(recordingDiv);
    });
  }
  