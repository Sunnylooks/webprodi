// Admin Dashboard Animations JS

document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scroll untuk pagination links
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                const element = document.querySelector(href);
                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.animation = 'slideInFromLeft 0.6s ease-out';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe metric cards
    document.querySelectorAll('.metric-card').forEach(card => {
        observer.observe(card);
    });

    // Observe table cards
    document.querySelectorAll('.table-card').forEach(card => {
        observer.observe(card);
    });

    // Add ripple effect to buttons
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');

            // Remove existing ripple
            const existingRipple = this.querySelector('.ripple');
            if (existingRipple) {
                existingRipple.remove();
            }

            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Animate number counters
    const animateCounter = (element, target, duration = 1000) => {
        let current = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    };

    // Target metric values for animation
    document.querySelectorAll('.metric-value').forEach(element => {
        const value = parseInt(element.textContent);
        if (!isNaN(value)) {
            const originalValue = element.textContent;
            element.style.opacity = '0';
            setTimeout(() => {
                element.style.opacity = '1';
                element.style.transition = 'opacity 0.3s ease-out';
                animateCounter(element, value, 800);
            }, 300);
        }
    });

    // Add hover effect to table rows
    document.querySelectorAll('.table-card tbody tr').forEach((row, index) => {
        row.style.animationDelay = (index * 0.05) + 's';
        
        row.addEventListener('mouseenter', function() {
            this.style.boxShadow = 'inset 3px 0 0 #667eea';
            this.style.transform = 'translateX(5px)';
        });

        row.addEventListener('mouseleave', function() {
            this.style.boxShadow = 'none';
            this.style.transform = 'translateX(0)';
        });
    });

    // Add glow effect to badges
    document.querySelectorAll('.badge').forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 0 15px rgba(102, 126, 234, 0.4)';
        });

        badge.addEventListener('mouseleave', function() {
            this.style.boxShadow = 'none';
        });
    });

    // Sidebar menu active indicator animation
    const sidebarItems = document.querySelectorAll('.admin-sidebar .nav-item');
    sidebarItems.forEach(item => {
        item.addEventListener('click', function() {
            sidebarItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Smooth page transitions
    const links = document.querySelectorAll('a:not([target="_blank"]):not([data-toggle])');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only animate if it's an internal link
            if (href && !href.startsWith('#') && !href.includes('javascript')) {
                const isFormSubmit = this.closest('form');
                if (!isFormSubmit) {
                    e.preventDefault();
                    
                    const content = document.querySelector('.admin-content');
                    content.style.opacity = '0.5';
                    content.style.transform = 'scale(0.98)';
                    
                    setTimeout(() => {
                        window.location.href = href;
                    }, 200);
                }
            }
        });
    });

    // Add pulse animation to header search
    const searchInput = document.querySelector('.admin-header-search input');
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            this.parentElement.style.boxShadow = '0 0 0 3px rgba(102, 126, 234, 0.1)';
            this.parentElement.style.transition = 'box-shadow 0.3s ease';
        });

        searchInput.addEventListener('blur', function() {
            this.parentElement.style.boxShadow = 'none';
        });

        // Global search functionality
        searchInput.addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            if (searchValue.length > 0) {
                // Search in table rows if on pages page
                const tableRows = document.querySelectorAll('.table-card tbody tr');
                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            } else {
                // Show all rows
                const tableRows = document.querySelectorAll('.table-card tbody tr');
                tableRows.forEach(row => {
                    row.style.display = '';
                });
            }
        });
    }

    // Animate header icons on hover
    document.querySelectorAll('.admin-header-right i').forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.color = '#667eea';
            this.style.transform = 'scale(1.2) rotate(10deg)';
        });

        icon.addEventListener('mouseleave', function() {
            this.style.color = '#666';
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });

});

// Add ripple effect CSS dynamically
const style = document.createElement('style');
style.innerHTML = `
    .btn {
        position: relative;
        overflow: hidden;
    }

    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
