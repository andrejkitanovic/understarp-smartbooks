console.log('animations loaded')
jQuery(document).ready(function ($) {
  if (gsap) {
    // Header
    $(function () {
      const header = $("header");
      const scrollToTop = $(".scroll-to-top");

      scrollToTop.on("click", () => {
        $(window).scrollTop(0);
      });

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
		console.log('word:', word)
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
		  console.log('wordText:', wordText)
          const newWord = categories[index].getAttribute("data-word");
	      console.log('newword:', newWord)
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
          }, (changeInterval - 150) / wordText.length);

          const typeFunction = () => {
			console.log('wordtext, length:', wordText, wordText.length)
			console.log('newWord, length:', newWord, newWord.length)
            if (wordText.length < newWord.length) {
              wordText += newWord.charAt(wordText.length);
			  console.log('wordText:', wordText)
              word.text(wordText);
            } else {
              clearInterval(typeNewWord);
            }
          };
        };
      }
    });

    //Sliders
    $(function () {
      if (Swiper) {
        $(function () {
          // ---- ALL SLIDERS -----
          const IsInitialized = (ele) =>
            ele.hasClass("swiper-container-initialized");
          const swiperInstances = {
            testimonials: { instance: null, init: false },
          };

          // -------- TESTIMONIALS SLIDER --------
          const testimonialsSlider = $(".testimonials__slider");

          function setupTestimonialsSlider(
            isLooped,
            isAutoplayed,
            delayInterval
          ) {
            let autoplayObject = {};

            if (isAutoplayed) {
              autoplayObject = {
                autoplay: {
                  delay: parseInt(3000),
                },
              };
            }

            swiperInstances.testimonials.instance = new Swiper(
              testimonialsSlider[0],
              {
                slidesPerView: 2,
                spaceBetween: 100,
                loop: isLooped,
                ...autoplayObject,
              }
            );
          }

          if (testimonialsSlider.length > 0) {
            if (!IsInitialized(testimonialsSlider)) {
              let isLooped = testimonialsSlider.attr("data-loop");
              let isAutoplayed = testimonialsSlider.attr(
                "data-autoplay"
              );
              let delayInterval = testimonialsSlider.attr(
                "data-interval"
              );
              setupTestimonialsSlider(isLooped, isAutoplayed, delayInterval);
            }
          }
        });
      }
    });

    // //Calendar
    // $(function () {
    //   let initialized = false;
    //   var intersectionObserver = new IntersectionObserver(function (entries) {
    //     if (entries[0].intersectionRatio <= 0) return;

    //     if (!initialized) {
    //     }
    //   });

    //   intersectionObserver.observe($(".consultation")[0]);
    // });
  }
});
