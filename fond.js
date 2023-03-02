      // Récupérer le canvas
      var canvas = document.getElementById("canvas");

      // Définir la taille du canvas sur la taille de la fenêtre
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;

      // Récupérer le contexte de dessin 2D
      var ctx = canvas.getContext("2d");

      // Définir les traits à la craie
      var traits = [];
      var nbTraits = 10;
      for (var i = 0; i < nbTraits; i++) {
        var x = Math.random() * canvas.width;
        var y = Math.random() * canvas.height;
        var angle = Math.random() * 4 * Math.PI;
        var taille = Math.random() * 30 + 10;
        var vx = Math.cos(angle) * taille / 18;
        var vy = Math.sin(angle) * taille / 18;
        var couleur = "#ED6969 #82C172 #5E7CCA white".split(" ")[Math.floor(Math.random() * 4)] + "";
        traits.push({ x: x, y: y, vx: vx, vy: vy, taille: taille, couleur: couleur });
      }

      // Dessiner un trait à la craie
      function dessinerTrait(trait) {
        ctx.beginPath();
        ctx.strokeStyle = trait.couleur;
        ctx.lineWidth = trait.taille;
        ctx.lineCap = "carré";
        ctx.moveTo(trait.x, trait.y);
        ctx.lineTo(trait.x - trait.vx, trait.y - trait.vy);
        ctx.stroke();
      }

      // Animer les traits à la craie
      function animer() {
        // Effacer le canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Dessiner tous les traits à la craie
        for (var i = 0; i < traits.length; i++) {
          var trait = traits[i];
          dessinerTrait(trait);

          // Déplacer le trait à la craie
          trait.x += trait.vx;
          trait.y += trait.vy;

          // Inverser la direction si le trait atteint un bord du canvas
          if (trait.x < 0 || trait.x > canvas.width) {
            trait.vx = -trait.vx;
          }
          if (trait.y < 0 || trait.y > canvas.height) {
            trait.vy = -trait.vy;
          }
        }

        // Demander le prochain frame d'animation
        requestAnimationFrame(animer);
      }

      // Lancer l'animation
      animer();