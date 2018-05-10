<div class="main-container">

    <section class="text-center imagebg" data-overlay="4">
        <div class="background-image-holder background--bottom">
            <img alt="background" src="<?php echo base_url();?>assets/img/landing-3.jpg" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $title_plan;?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section-2 text-center">
        <div class="container">
            <div class="row">
              <?php
                $renderedList = [];
                $initialPrice = $prices_list->result()[0]->store_plan_value;
              ?>
              <?php foreach ($prices_list->result() as $prices): ?>
                <?php if (!in_array($prices->store_plan_level, $renderedList)): ?>
                  <div class="col-md-3">
                      <div class="pricing pricing-3">
                          <?php if ($prices->store_plan_high == 1): ?>
                            <div class="pricing__head bg--primary boxed">
                              <span class="label">Top</span>
                          <?php else: ?>
                            <div class="pricing__head bg--secondary boxed">
                          <?php endif; ?>
                              <h5><?php echo $prices->store_plan_units;?> <?php echo $meditionUnit;?></h5>
                              <span class="h1">
                                  <span class="pricing__dollar">$</span><?php echo $prices->store_plan_value;?></span>
                              <p class="type--fine-print">Pago Único, $ARS</p>
                              <p>
                                <?php
                                  $totalPriceOriginal = $initialPrice*$prices->store_plan_units;
                                  $discountPercent = ($prices->store_plan_value * 100) / $totalPriceOriginal;
                                  $discountString = round(100 - $discountPercent);
                                  if ($discountString > 0) {
                                    echo '%' . $discountString . ' de descuento';
                                  }else{
                                    echo '&nbsp;';
                                  }
                                ?>
                              </p>
                          </div>
                      </div>
                  </div>
                <?php endif; ?>
                <?php array_push($renderedList, $prices->store_plan_level);?>
              <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="cta">
                        <h2>Beneficios</h2>
                        <p class="lead">
                          Amplie su cartera de Clientes hoy a un precio unico y disfrute de todos los beneficios que NOMBREDEAPP puede brindarle.
                        </p>
                        <ul>
                            <li>
                                <span>Sin subscripcion</span>
                            </li>
                            <li>
                                <span>Multiple forma de Pagos</span>
                            </li>
                            <li>
                                <span>Publicacion en menos de 48 Hs.</span>
                            </li>
                            <li>
                                <span>Renovación al 50% del Valor.</span>
                            </li>
                            <li>
                                <span>Duración 3 Meses!</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="testimonial testimonial-2">
                        <div class="testimonial__body boxed boxed--border bg--secondary">
                            <p>
                                This is the best overall experience I have had with any template of any kind. Medium Rare made me feel like a valued customer and I feel empowered.
                            </p>
                        </div>
                        <div class="testimonial__image">
                            <img alt="Image" src="<?php echo base_url();?>assets/img/avatar-round-3.png" />
                            <h5>Raresh D.</h5>
                            <span>Kolkata, IN</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="testimonial testimonial-2">
                        <div class="testimonial__body boxed boxed--border bg--secondary">
                            <p>
                                Stack was easy to set-up and more importantly, was dead simple to customize. Buy this on sight
                            </p>
                        </div>
                        <div class="testimonial__image">
                            <img alt="Image" src="<?php echo base_url();?>assets/img/avatar-round-4.png" />
                            <h5>Robert S.</h5>
                            <span>Brisbane, AU</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="testimonial testimonial-2">
                        <div class="testimonial__body boxed boxed--border bg--secondary">
                            <p>
                                Best. customer. service. Seriously, I opened a ticket and they were so helpful and really seemed to care about my experience.
                            </p>
                        </div>
                        <div class="testimonial__image">
                            <img alt="Image" src="<?php echo base_url();?>assets/img/avatar-round-1.png" />
                            <h5>Gabby V.</h5>
                            <span>Sydney, AU</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="testimonial testimonial-2">
                        <div class="testimonial__body boxed boxed--border bg--secondary">
                            <p>
                                We’ve used their templates before and have always been hugely satisfied - Stack is no exception
                            </p>
                        </div>
                        <div class="testimonial__image">
                            <img alt="Image" src="<?php echo base_url();?>assets/img/avatar-round-2.png" />
                            <h5>Josephine L.</h5>
                            <span>California, US</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-block">
                        <h4>Frequently Asked Questions</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-block">
                        <h5>How do refunds work?</h5>
                        <p>
                            Open a
                            <a href="#">refund request</a> with us and we can work with you to resolve it ASAP.
                        </p>
                    </div>
                    <div class="text-block">
                        <h5>Can I pay using AMEX?</h5>
                        <p>
                            Yes, we accept all major credit cards, including AMEX, so rack up those points!
                        </p>
                    </div>
                    <div class="text-block">
                        <h5>Is there a bulk-buy discount?</h5>
                        <p>
                            We have corporate and enterprise arrangements that our pricing team can assist with on a case-by-case basis.
                            <a href="#">Contact Us</a> for info.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-block">
                        <h5>Is there a minimum contract term?</h5>
                        <p>
                            No! The beauty of our service is that you can cancel anytime you need to &mdash; no questions asked.
                        </p>
                    </div>
                    <div class="text-block">
                        <h5>Do I need an SSL certificate?</h5>
                        <p>
                            This depends on whether your plan to process the payment on your site or not. We recommend using a third-party provider to unburden yourself.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="cta">
                        <h2>Purchase Stack now and get lifetime free content updates</h2>
                        <p class="lead">
                            Each purchase of Stack comes with six months free support &mdash; and a lifetime of free content and bug-fix updates.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
