@if(isset($faqs) && $faqs->count() > 0)
    <section class="page-faqs-section container" style="margin-top: 80px; margin-bottom: 100px;">
        <h2 style="font-size: 32px; color: #fff; text-align: center; margin-bottom: 60px; font-weight: 700;">Frequently Asked Questions</h2>
        
        <div class="faqs-container" style="max-width: 1000px; margin: 0 auto;">
            @foreach($faqs as $faq)
                <div class="faq-item" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding: 30px 0; cursor: pointer; transition: background-color 0.3s ease;">
                    <div class="faq-grid">
                        <div class="faq-question-col">
                            <h3 style="font-size: 18px; font-weight: 500; color: #fff; margin: 0; line-height: 1.4;">{{ $faq->question }}</h3>
                        </div>

                        <div class="faq-answer-col">
                            <div class="faq-answer-content" style="color: #bbb; font-size: 14px; line-height: 1.6; margin: 0; text-align: justify;">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                        
                        <div class="faq-icon-col" style="display: flex; justify-content: flex-end;">
                            <div class="faq-icon">
                                <svg class="icon-plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.25 5.25V0H6.75V5.25H12V6.75H6.75V12H5.25V6.75H0V5.25H5.25Z" fill="#1a1a1a"/>
                                </svg>
                                <svg class="icon-close" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1.06066L10.9393 0L6 4.93934L1.06066 0L0 1.06066L4.93934 6L0 10.9393L1.06066 12L6 7.06066L10.9393 12L12 10.9393L7.06066 6L12 1.06066Z" fill="#1a1a1a"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @once
    <style>
        .page-faqs-section .faq-grid {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: start;
            gap: 20px;
        }
        
        .page-faqs-section .faq-answer-col {
            display: none;
            padding-right: 20px;
        }

        .page-faqs-section .faq-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #b0b0b0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        


        .page-faqs-section .icon-close {
            display: none;
        }

        /* Active State */
        .page-faqs-section .faq-item.active .faq-grid {
            grid-template-columns: 1fr 1fr auto;
            gap: 40px;
        }
        
        .page-faqs-section .faq-item.active .faq-answer-col {
            display: block;
            animation: fadeIn 0.4s ease forwards;
        }
        
        .page-faqs-section .faq-item.active .icon-plus {
            display: none;
        }
        
        .page-faqs-section .faq-item.active .icon-close {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Mobile Layout */
        @media (max-width: 768px) {
            .page-faqs-section .faq-item.active .faq-grid {
                grid-template-columns: 1fr auto;
                gap: 15px;
            }
            .page-faqs-section .faq-item.active .faq-question-col {
                grid-column: 1;
                grid-row: 1;
            }
            .page-faqs-section .faq-item.active .faq-icon-col {
                grid-column: 2;
                grid-row: 1;
            }
            .page-faqs-section .faq-item.active .faq-answer-col {
                grid-column: 1 / -1;
                grid-row: 2;
                padding-right: 0;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pageFaqItems = document.querySelectorAll('.page-faqs-section .faq-item');
            
            pageFaqItems.forEach(item => {
                // Attach event to the whole item for better UX
                item.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all FAQs first
                    pageFaqItems.forEach(i => {
                        i.classList.remove('active');
                    });
                    
                    // If the clicked FAQ wasn't already active, open it
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        });
    </script>
    @endonce
@endif
