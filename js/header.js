jQuery(document).ready(function ($) {
  if (gsap) {
    // Header
    $(function () {
      const header = $("header");

      const changeState = (self) => {
        const isDirectionUp = self.direction === -1;

        if (isDirectionUp) {
          $(header)[0].classList.remove("hidden");
        } else {
          $(header)[0].classList.add("hidden");
        }
      };

      ScrollTrigger.create({
        start: "top+=250",
        end: document.innerHeight,
        onUpdate: changeState,
      });
    });

    // Hero Block
    $(function () {
      const heroBlock = $(".hero");

      if (heroBlock.length > 0) {
        let current = 1;
        let categories = $(".hero__image");
        let word = $("h1 span");

        const goToNext = () => {
          if (current < categories.length) {
            changeCategory(current);
          } else changeCategory(0);
        };

        const slidesInterval = $(".hero__images").attr("data-interval");

        setInterval(goToNext, parseInt(slidesInterval));

        const changeCategory = (index) => {
          index = parseInt(index);
          if (current === index + 1) return;

          const tl = gsap.timeline({});

          const changeInterval = 500;

          tl.to(categories[current - 1], changeInterval / 1000, {
            autoAlpha: 0,
            display: "none",
            x: 10,
            ease: "power2",
          });

          current = index + 1;

          tl.to(categories[index], 0, {
            display: "block",
            autoAlpha: 0,
            x: 30,
          });

          tl.to(categories[index], changeInterval / 1000, {
            autoAlpha: 1,
            x: 0,
            ease: "power2",
          });

          let wordText = word.text();
          const newWord = categories[index].getAttribute("data-word");

          let typeNewWord = null;
          let remove = setInterval(() => {
            if (wordText.length > 0) {
              wordText = wordText.slice(0, -1);
              word.text(wordText);
            } else {
              clearInterval(remove);
              typeNewWord = setInterval(
                typeFunction,
                changeInterval / newWord.length
              );
            }
          }, changeInterval / wordText.length);

          const typeFunction = () => {
            if (wordText.length < newWord.length) {
              wordText += newWord.charAt(wordText.length);
              word.text(wordText);
            } else {
              clearInterval(typeNewWord);
            }
          };
        };
      }
    });
  }
});
