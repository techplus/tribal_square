@extends('layouts.front')
@section('content')
<div class="wrapper"> 
<div class="row">
    <div class="container">
      <div class="pull-left logo">
        <a href="{{url('/')}}">
          <img src="{{asset('/images/logo1.jpg')}}" alt="" class="img-responsive">
        </a>
      </div>
      
      <a href="#" class="col-sm-4 col-lg-3 col-xs-12 pull-right text-center questions_top_btn">
        <div>Discuss all things</div>
        <p>Africa in the Forum</p>
      </a>
    </div>
</div>  

<div class="row terms_content_wrap">
        <h1>Terms of Use</h1>
        <p class="col-xs-10 col-xs-offset-1">
            Welcome to TribalSquare. By using our website, you are agreeing to these Terms of Use. Please read them carefully. If you have any questions, contact us <a href="#">here</a>.
            <br>
            <br> Registration on TribalSquare is free. Your registration constitutes your acceptance of the complete Terms of Use; the Agreement &amp; Rights; the Terms of Conduct; the <a href="{{action('HomeController@getRefundpolicy')}}">Refund Policy</a> and <a href="{{action('HomeController@getPrivacypolicy')}}">Privacy Policy</a> as described herein and create a binding legal agreement.
            <br>
            <br> A paid subscription is not required to list your profile or search the TribalSquare database. Once you have registered for free, you may subscribe to gain privileges for either the TribalDeals or TribalListings, or TribalSitter database. There are no additional placement fees or commissions charged by TribalSquare. Membership subscriptions are autorenewed based on your selected subscription term, which you may modify or cancel at any time by clicking the links, "change subscription term" or "cancel auto renew" under the tab, My Account.
            <!-- <br><br>
        These Terms of Use were last updated on April 19, 2015. -->
        </p>
</div>

<div class="row terms_content_wrap">
        <h1><u>ACCEPTANCE OF TERMS OF USE</u></h1>
        <p class="col-xs-10 col-xs-offset-1 term_content">
            TribalSquare, Inc. (<b>“TribalSquare” "we"</b> or <b>“us”</b> or <b>“our”</b>) owns and operates the website, www.tribalsquare.com, the mobile and touch versions and any sites we have now or in the future that reference these Terms of Use (collectively, <b>"Site"</b>). By using the Site and TribalSquare’s services through the Site, you agree to these Terms of Use (defined below) and any additional terms applicable to certain programs in which you may elect to participate. You also agree to our Privacy Statement, located at <a href="#">Policy</a>, and acknowledge that you will regularly visit the Terms of Use (defined below) to familiarize yourself with any updates. The Privacy Statement, together with these terms of use, and any other terms contained herein or incorporated herein by reference, are collectively referred to as the
            <b>"Terms of Use"</b>. The term "using" also includes any person or entity that accesses or uses the Site with crawlers, robots, data mining or extraction tools or any other functionality.
            <br>
            <br> IF YOU DO NOT AGREE TO THESE TERMS OF USE, IMMEDIATELY STOP USING THE SITE AND DO NOT USE ANY DEALs SERVICE, PARTICIPATE IN ANY PROGRAM OR PURCHASE ANY VOUCHER, PRODUCT OR OTHER GOOD OR SERVICE OFFERED THROUGH THE SITE.
            <br>
            <br>
            <b>These Terms of Use are organized as follows:</b>
            <br><br>
            </p><ol class="col-xs-8 col-xs-offset-2 terms_link">
                <li><a href="#about_the_site">About the Site</a></li>
                <li><a href="#ownership">Ownership of the Site</a></li>
                <li><a href="#use_of_the_Site">Use of the Site</a></li>
                <li><a href="#access">Access to the Site</a></li>
                <li><a href="#modification">Modification</a></li>
                <li><a href="#your_account">Your Account</a></li>
                <li><a href="#your_conduct">Your Conduct</a></li>
                <li><a href="#your_privacy">Your Privacy</a></li>
                <li><a href="#terms">Terms of Sale</a></li>
                <li><a href="#trademarks">Copyright and Trademarks</a></li>
                <li><a href="#user_content">User Content</a></li>
                <li><a href="#unsolicited">Unsolicited Ideas</a></li>
                <li><a href="#copyright">Copyright Policy and Digital Millennium Copyright Act (DMCA)
Procedures</a></li>
                <li><a href="#disclaimer">Disclaimer of Warranty</a></li>
                <li><a href="#limitation">Limitation of Liability</a></li>
                <li><a href="#electronic">Electronic Communications</a></li>
                <li><a href="#websites">Websites of Others</a></li>
                <li><a href="#indemnification">Indemnification/Release</a></li>
                <li><a href="#force">Force Majeure</a></li>
                <li><a href="#assignment">Assignment</a></li>
                <li><a href="#entire">Entire Agreement</a></li>
                <li><a href="#choice">Choice of Law</a></li>
                <li><a href="#dispute">Dispute Resolution</a></li>
                <li><a href="#additional">Additional Disclosures</a></li>
            </ol>
            <br>
            <br>
            <ol class="col-xs-10 col-xs-offset-1 term_list_content">
                <li id="about_the_site">
                    <h3>About the Site</h3>
                    <p><b><i>TribalDeals: </i></b> The TribalDeals portion of the Site is a platform through which certain merchants (<b>“Merchants”</b>) sell vouchers for goods, services or experiences, and make available coupon offerings, (collectively, <b>“TribalDeals”</b>). Merchants are the sellers and issuers of vouchers and coupons. The Merchant is solely responsible to you for the care and quality of the goods and services it provides.
                        <br>
                        <br> <b><i>TribalListings:</i></b> The TribalListings portion of the Site is a platform through which local classifieds (<b>“TribalListings”</b>) and forums, are listed for free.
                        <br>
                        <br> <b><i>TribalSitters:</i></b> The TribalSitters portion of the Site is a platform that connects families and individuals with in-home caregivers (babysitters and nannies) (<b>“TribalSitters”</b>).
                        <br>
                        <br> All TribalDeals, TribalListings, and TribalSitters, and other available programs and pricing on the Site may change at any time in TribalSquare’s discretion, without notice.
                    </p>
                </li>
                <li id="ownership">
                    <h3>Ownership of the Site</h3>
                    <p>The Site, any content on the Site and the infrastructure used to provide the Site are proprietary to us, our affiliates, Merchants and other content providers. By using the Site and accepting these Terms of Use: (a) TribalSquare grants you a limited, personal, nontransferable, nonexclusive, revocable license to use the Site pursuant to these Terms of Use and to any additional terms and policies set forth by TribalSquare; and (b) you agree not to reproduce, distribute, create derivative works from, publicly display, publicly perform, license, sell or re-sell any content, software, products or services obtained from or through the Site without the express permission of TribalSquare.
                    </p>
                </li>
                <li id="use_of_the_Site">
                    <h3>Use of the Site</h3>
                    <p>As a condition of your use of the Site, you agree that:
                    </p>
                    <ul class="sub_point_list">
                        <li>You are at least 18 years of age;</li>
                        <li>You are able to create a binding legal obligation;</li>
                        <li>You are not barred from receiving products or services under applicable law;</li>
                        <li>You will not attempt to use the Site with crawlers, robots, data mining or extraction tools or any other functionality;</li>
                        <li>Your use of the Site will at all times comply with these Terms of Use;
                        </li>
                        <li>You will only make legitimate purchases that comply with the letter and spirit of the terms of the respective offers;</li>
                        <li>You will only make purchases on the Site for your own use and enjoyment or, as a gift for another person;</li>
                        <li>You have the right to provide any and all information you submit to the Site, the information and all such information is accurate, true, current and complete;</li>
                        <li>You will update and correct information you have submitted to the Site and ensure that it is accurate at all times (out-of-date information will invalidate your account); and,</li>
                        <li>You will only purchase a TribalDeal Offering or participate in other available programs through the Site by creating an account on the Site, and any purchase will be subject to the applicable Terms of Sale set forth in these Terms of Use.</li>
                        <li>If you post a personal profile (content and information about you or your family) inclusive of photos, complaints, comments or reviews on TribalSquare.com, you grant to TribalSquare a non-exclusive, royalty-free, perpetual, irrevocable, and fully sublicensable right to use, reproduce, modify, adapt, publish, use in promotional campaigns, translate, create derivative works from, distribute, and display your profile information, including but not limited to written contents, photos, videos, complaints, comments or reviews throughout the world in any media. You also grant TribalSquare and its affiliates and the sublicensees the right to use the name that you submit with any profile, complaint, comment or testimonial, if any, in connection with such profile, complaint, comment or testimonial.
                        </li>
                        <li>TribalSquare does not condone or allow the hiring of foreign nationals outside the prescribed laws of any country in which it operates.
                        </li>
                        <li>Each country has its own immigration and employment laws. TribalSquare does not offer legal advice. So if you do not understand the laws of your country, seek appropriate legal counsel to be sure you understand and abide by proper work visa and employment laws when hiring a foreign national.</li>
                        <li>TribalSquare members who attempt to subvert the labor laws and visa regulations of their country may be removed from the TribalSquare website and disallowed future access. Determination of violation shall be at the sole discretion of TribalSquare.</li>
                    </ul>
                </li>
                <li id="access">
                    <h3>Access to the Site</h3>
                    <p>TribalSquare retains the right, at our sole discretion, to deny service or use of the Site or an account to anyone at any time and for any reason. While we use reasonable efforts to keep the Site and your account accessible, the Site and/or your account may be unavailable from time to time. You understand and agree that there may be interruptions in service or events, Site access or access to your account due to circumstances both within our control (e.g., routine maintenance) and outside of our control.
                    </p>
                </li>
                <li id="modification">
                    <h3>Modification</h3>
                    <p>We reserve the right at all times to discontinue or modify any part of these Terms of Use in our sole discretion. If we make changes that affect your use of the Site or our services we will post notice of the change on the Terms of Use page. Any changes to these Terms of Use will be effective upon our posting of the notice; provided that these changes will not apply to TribalDeals purchased prior to the effective date of such changes. If you do not agree to the changes, you may close your account and you should not use the Site or any services offered through the Site after the effective date of the changes. We suggest that you revisit our Terms of Use regularly to ensure that you stay informed of any changes. You agree that posting notice of any changes on the Terms of Use page is adequate notice to advise you of these changes, and that your continued use of the Site or our services will constitute acceptance of these changes and the Terms of Use as modified.
                    </p>
                </li>
                <li id="your_account">
                    <h3>Your Account</h3>
                    <p>You may only create and hold one account on the Site for your personal use and must register using a valid credit card. You are responsible for updating and correcting information you have submitted to create or maintain your account. As part of your account settings, you have the option to: (a) save, edit or delete your personal information, including, without limitation, payment data; and (b) opt-out of persistent login. You understand and agree that TribalSquare shall have no responsibility for any incident arising out of, or related to, your account settings. You must safeguard your password and supervise the use of your account. You are solely responsible for maintaining the security of your account and maintaining settings that reflect your preferences. We will assume that anyone using the Site or transacting through your account is you. You agree that you are solely responsible for any activity that occurs under your account. Your account will expire and you will lose any TribalSquare Bucks earned through a Promotional Activity if your account is not maintained with current information, including a valid credit card.
                        <br>
                        <br> Your account is non-transferrable. You cannot sell, combine, or otherwise share it with any other person. Any violation of these Terms of Use, including failure to maintain updated and correct information about your account, will cause your account to fall out of good standing and we may cancel your account in our sole discretion. If your account is cancelled, you may forfeit any pending, current or future promotional account credits and any other forms of unredeemed value in your account. Upon termination, the provisions of these Terms of Use that are by their nature intended to survive termination (e.g., any disclaimers, all limitations of liability and all indemnities) shall survive. We also reserve the right to change or discontinue any aspect or feature of our services or the Site, including, but not limited to, requirements for use.
                    </p>
                </li>
                <li id="your_conduct">
                    <h3>Your Conduct</h3>
                    <p>All interactions on the Site must comply with these Terms of Use. To the extent your conduct, in our sole discretion, restricts or inhibits any other user from using or enjoying any part of the Site, we may limit your privileges on the Site and seek other remedies.
                        <br>
                        <br>The following activities are <b><u>prohibited</u></b> on the Site and constitute express violations of these Terms of Use:
                    </p>
                    <ul class="sub_point_list">
                        <li>Submitting any content to the Site that:
                            <ul>
                                <li>Violates applicable laws (including but not limited to intellectual property laws, laws relating to rights of privacy and rights of publicity and laws related to defamation);</li>
                                <li>Contains personal information, except when we expressly ask you to provide such information;</li>
                                <li>Contains viruses or malware;</li>
                                <li>Offers unauthorized downloads of any copyrighted, confidential or private information;</li>
                                <li>Has the effect of impersonating others;</li>
                                <li>Contains messages by non-spokesperson employees of TribalSquare purporting to speak on behalf of TribalSquare or provides confidential information concerning TribalSquare;</li>
                                <li>Contains chain letters of any kind;</li>
                                <li>Is purposely inaccurate, commits fraud or falsifies information in connection with your TribalSquare account or to create multiple TribalSquare accounts; or</li>
                                <li>Is protected by copyright, trademark or other proprietary right without the express permission of the owner of the copyright, trademark or other proprietary right.</li>
                            </ul>
                        </li>
                        <br>
                        <li>Attempting to do or actually doing any of the following:
                            <ul>
                                <li>Accessing data not intended for you, such as logging into a server or an account which you are not authorized to access;</li>
                                <li>Scanning or monitoring the Site for data gathering purposes in an effort to track sales, usage, aggregate offering information, pricing information or similar data;</li>
                                <li>Scanning or testing the security or configuration of the Site or to breach security or authentication measures; or</li>
                                <li>Interfering with service to any user in any manner, including, without limitation, by means of submitting a virus to the Site or attempting to overload, “flood,” “spam,” “mail bomb” or “crash” the Site.</li>
                            </ul>
                        </li>
                        <br>
                        <li>Using any of the following:
                            <ul>
                                <li>Frames, framing techniques or framing technology to enclose any content included on the Site without our express written permission;
                                </li>
                                <li>Any Site content, including without limitation User Content (defined below), in any meta tags or any other “hidden text” techniques or technologies without our express written permission;
                                </li>
                                <li>The Site or any of its contents to advertise or solicit, for any commercial, political or religious purpose or to compete, directly or indirectly, with TribalSquare; or</li>
                                <li>The Site or any of its resources to solicit consumers, Merchants or other third-parties to become users or partners of other online or offline services directly or indirectly competitive or potentially competitive with TribalSquare, including, without limitation, aggregating current or previously offered deals.</li>
                            </ul>
                        </li>
                        <br>
                        <li>Collecting any of the following:
                            <ul>
                                <li>Content from the Site, including, but not limited to, in connection with current or previously offered deals, and featuring such content to consumers in any manner that diverts traffic from the Site without our express written permission; or
                                </li>
                                <li>Personal Information (defined in our Privacy Statement), User Content (defined in Section 12 below) or content of any consumers or Merchants.
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li>Engaging in any of the following:
                            <ul>
                                <li>
                                    Tampering or interfering with the proper functioning of any part, page or area of the Site or any functions or services provided by TribalSquare;
                                </li>
                                <li>
                                    Taking any action that places excessive demand on our services or imposes, or may impose, an unreasonable or disproportionately large load on our servers or other portion of our infrastructure (as determined in our sole discretion);
                                </li>
                                <li>
                                    Reselling or repurposing your access to the Site or any purchases made through the Site;
                                </li>
                                <li>
                                    Exceeding or attempting to exceed quantity limits when purchasing TribalDeals, or otherwise using any TribalSquare account to purchase TribalDeals for resale or for speculative, false, fraudulent or any other purpose not expressly permitted by these Terms of Use and the terms of a specific offer on the Site;
                                </li>
                                <li>
                                    Accessing, monitoring or copying any content from the Site using any “robot,” “spider,” “scraper” or other automated means or any manual process for any purpose without our express written permission;
                                </li>
                                <li>
                                    Violating the restrictions in any robot exclusion headers on the Site or bypassing or circumventing other measures employed to prevent or limit access to the Site;
                                </li>
                                <li>
                                    Aggregating any current or previously-offered deals or content or other information from the Site (whether using links or other technical means or physical records associated with purchases made through the Site) with material from other sites or on a secondary site without our express written permission;
                                </li>
                                Deep-linking to any portion of the Site (including, without limitation, the purchase path for any TribalDeals) without our express written permission;
                                <li>
                                    Hyperlinking to the Site from any other website without our initial and ongoing consent; or
                                </li>
                                <li>
                                    Acting illegally or maliciously against the business interests or reputation of TribalSquare, our Merchants or our services.
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <br>
                    <p>
                        In addition as condition of your use of the TribalDeals, TribalListings, and TribalSitters portions of this website, you agree that <b>you shall not:</b>
                    </p>
                    <br>
                    <ol type="A" class="sub_point_list">
                        <li>Include your last name or enter your personal contact information such as an email address, chat address, social media page, apps, electronic or personal web page address in any photo, image or text field which does not specifically request such information;</li>
                        <br>
                        <li>Attempt to subvert the membership subscription system or direct users to any other website, location or directory where your contact information may be obtained;</li>
                        <br>
                        <li>Upload or post any information or advertisement that may be considered as competitive to the TribalSitters service. Solicitation for services by any means, other than those offered or directly approved by TribalSquare, to its registered users is strictly forbidden. And under no circumstances shall the harvesting and commercial re-use of emails be allowed;</li>
                        <br>
                        <li>Share your account credentials or membership subscription with any other person or third party. If, despite the foregoing, you lose control of your password, you may lose substantial control over your personally identifiable information and may be subject to legally binding actions taken on your behalf;</li>
                        <br>
                        <li>Upload, post, email or otherwise transmit any content that is unlawful, harmful, threatening, harassing, defamatory, obscene, vulgar, invasive of another's privacy, hateful, discriminatory or otherwise objectionable;
                        </li>
                        <br>
                        <li>Upload, post, email or otherwise transmit any content that you do not have a right to transmit under any law or under contractual or fiduciary relationships (such as insider information, proprietary and confidential information learned or disclosed as part of employment relationships or under nondisclosure agreements) or any content that infringes any patent, trademark, trade secret, copyright or other proprietary rights of any party;
                        </li>
                        <br>
                        <li>Upload, post, email or otherwise transmit any material that contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software;</li>
                        <br>
                        <li>Interfere with or disrupt (or attempt to interfere with or disrupt) this site or servers or networks connected to this site, or disobey any requirements, procedures, policies or regulations of networks connected to this site;</li>
                        <br>
                        <li>Exhibit expressions of abuse, use or display offensive language or imagery, obscenity, or pornography, including, but not limited to, child abuse, child pornography, depictions of minors engaged in sexual conduct or explicitly sexual situations or any other material that could give rise to any civil or criminal liability under applicable state or federal law, or violate any laws or regulations of any governing body having jurisdiction over TribalSquare or its subsidiaries, affiliates or users;</li>
                        <br>
                        <li>Solicit any relationship other than employer/employee related to childcare as may be found through this Service, and shall by no means attempt to divert members to any other service, employer, agent or sponsor other than TribalSquare;</li>
                        <br>
                        <li>Harm others in any way.</li>
                    </ol>
                </li>
                <li id="your_privacy">
                    <h3>Your Privacy</h3>
                    <p>We take the privacy of your personal data seriously. We encourage you to carefully review our Privacy Statement for important disclosures about ways that we may collect, use, and share personal data and your choices. Our Privacy Statement is incorporated in these Terms of Use, and available here.
                    </p>
                </li>
                <li id="terms">
                    <h3>Terms of Sale</h3>
                    <p>By purchasing or obtaining any TribalDeal, TribalListing, and TribalSitter via the Site, you agree to these Terms of Use, including Tribalsquares Terms of Sale.
                    </p>
                </li>
                <li id="trademarks">
                    <h3>Copyright and Trademarks</h3>
                    <p>The Site contains copyrighted material, trademarks and other proprietary information, including, but not limited to, text, software, photos, video, graphics, music and sound and the entire contents of the Site are protected by copyright, trademark and other intellectual property laws of the United States. TribalSquare owns a copyright in the selection, coordination, arrangement and enhancement of such content, as well as in the content original to it. You may not modify, distribute, publish, transmit, publicly display, publicly perform, participate in the transfer or sale, create derivative works or in any way exploit any of the content, in whole or in part. Except as otherwise expressly stated under copyright law, no downloading, copying, redistribution, retransmission, publication or commercial exploitation of the content without the express permission of TribalSquare or the copyright owner is permitted. If downloading, copying, redistribution, retransmission or publication of copyrighted material is permitted, you will make independent attribution and/or make no changes in or deletion of any author attribution, trademark legend or copyright notice. You acknowledge that you do not acquire any ownership rights by downloading copyrighted material. Any violation of these restrictions may result in a copyright, trademark or other intellectual property right infringement that may subject you to civil and/or criminal penalties.
                        <br>
                        <br> You will not upload, post or otherwise make available on the Site any material protected by copyright, trademark or other proprietary right without the express permission of the owner of the copyright, trademark or other proprietary right. TribalSquare does not have any express burden or responsibility to provide you with indications, markings or anything else that may aid you in determining whether the material in question is copyrighted or trademarked. You will be solely liable for any damage resulting from any infringement of copyrights, trademarks, proprietary rights or any other harm resulting from such a submission.
                        <br>
                        <br> TribalSquare owns trademarks, registered and unregistered, in many countries and "TRIBALSQUARE," the TribalSquare logos and variations thereof found on the Site are trademarks owned by TribalSquare, Inc. or its related entities and all use of these marks inures to the benefit of TribalSquare. “TRIBALSQUARE” is a trademark registered in the following countries: the United States of America.
                        <br>
                        <br> Other marks on the site not owned by TribalSquare may be under license from the trademark owner thereof, in which case such license is for the exclusive benefit and use of TribalSquare unless otherwise stated, or may be the property of their respective owners. You may not use TribalSquare 's name, logos, trademarks or brands without TribalSquare's express permission.
                    </p>
                </li>
                <li id="user_content">
                    <h3>User Content</h3>
                    <p>The Site may provide registered users and visitors various opportunities to submit or post reviews, opinions, advice, ratings, discussions, comments, messages, survey responses and other communications, as well as files, images, photographs, video, sound recordings, musical works and other content (collectively, <b>"User Content"</b>) through forums, bulletin boards, discussion groups, chat rooms, surveys, blogs or other communication facilities that may be offered on, through, or in connection with the Site from time to time. You may be required to have a TribalSquare account to submit User Content.
                        <br>
                        <br> If you contribute any User Content, you represent and warrant that: (a) you are the creator the User Content; or (b) if you are acting on behalf of the creator, that you have (i) express, advance authority from the creator to submit or post the User Content, and (ii) all rights necessary to grant the licenses and grants in these Terms of Use. You further represent and warrant (or, if you are acting on behalf of the creator of the User Content, you have assured that the creator represents and warrants) that the sharing of the User Content for the purposes you have selected will not violate or infringe any copyrights, trademarks or any other intellectual property rights or rights of third parties, including the rights of publicity or privacy. You represent and warrant that you will not upload, post, transmit or otherwise make available User Content that is unlawful, harmful, tortious, threatening, abusive, harassing, hateful, racist, infringing, pornographic, obscene, violent, misleading, defamatory or libelous, invasive of the privacy of another person or violative of any third-party rights; or if User Content contains any material that harbors viruses or any other computer codes, files or programs designed to interrupt, destroy or limit the functionality of any software or computer equipment.
                        <br>
                        <br>TribalSquare shall have the sole and absolute right, but not the obligation, to review, edit, post, refuse to post, remove, monitor the User Content and disclose the User Content and the circumstances surrounding its transmission to any third-party, at any time, for any reason, including to determine compliance with these Terms of Use and any operating rules established by TribalSquare, as well as to satisfy any applicable law, regulation or authorized government request. Without limiting the foregoing, TribalSquare shall have the right to remove any material from the Communities or any other TribalSquare controlled sites, in its sole and absolute discretion. TribalSquare assumes no liability for any User Content or other information that appears or is removed from the Site or elsewhere. TribalSquare has no obligation to use User Content and may not use it at all.
                        <br>
                        <br> In some instances and from time to time, it may be possible to modify or remove the User Content submitted or posted through your account. TribalSquare makes no representations or warranties that the User Content you modify or remove will be modified or removed from the Site or elsewhere, or that the User Content will cease to appear on the Internet, in search engines, social media websites, or in any other form, media or technology.
                    </p>
                    <ul class="sub_point_list">
                        <li>Public Nature of Your User Content.
                            <ul>
                                <li>You understand and agree that User Content is public. Any person (whether or not a user of TribalSquare’s services) may read your User Content without your knowledge. Please do not include any Personal Information in your User Content unless you wish for it to be publicly disclosed. TribalSquare is not responsible for the use or disclosure of any Personal Information that you disclose in connection with User Content.</li>
                                <li>Any User Content of any kind made by you or any third-party is made by the respective author(s) or distributor(s) and not by TribalSquare. Other users may post User Content that is inaccurate, misleading or deceptive. TribalSquare does not endorse and is not responsible for any User Content, and will not be liable for any loss or damage caused by your reliance on such User Content. User Content reflects the opinions of the person submitting it and may not reflect the opinion of TribalSquare. TribalSquare does not control or endorse any User Content, and specifically disclaims any liability concerning or relating to your contribution of, use of, or reliance on any User Content and any actions resulting from your participation in any part of the Site, including any objectionable User Content.</li>
                            </ul>
                        </li>
                        <br>
                        <li>License Grants.
                            <ul>
                                <li>Some User Content you submit to TribalSquare may be displayed or may give you the option to display in connection with your Personal Information, or a portion of your Personal Information, including but not limited to your name, initials, username, social networking website user account name, image, likeness, preferences, voice and location. You grant TribalSquare a royalty-free, perpetual, irrevocable, sublicensable, fully paid-up, non-exclusive, transferrable, worldwide right to use, display, distribute, offer for sale and sell the Personal Information in connection with your User Content, whether the User Content appears alone or as part of other works, and in any form, media or technology, whether now known or hereinafter developed, and to sublicense such rights through multiple tiers of sublicensees, all without compensation to you. However, TribalSquare shall have no obligation to use your Personal Information in connection with any User Content.</li>
                                <li>As between you and TribalSquare, you shall retain all ownership rights in and to the User Content you submit or post. However, by contributing User Content or other information on or through the Site, you grant TribalSquare a royalty-free, perpetual, irrevocable, sublicensable, fully paid-up, non-exclusive, transferrable, worldwide right and license to use, reproduce, create derivative works from, publish, edit, translate, distribute, perform, display, transmit, offer for sale and sell the User Content alone or as part of other works in any form, media or technology, whether now known or hereafter developed, and to sublicense such rights through multiple tiers of sublicensees and without compensation to you. You waive any "moral rights" or other rights with respect to attribution of authorship or integrity of materials regarding the User Content that you may have under any applicable law under any legal theory. TribalSquare’s license in any User Content or Personal Information submitted includes, but is not limited to, use for promotions, advertising, marketing, market research, merchant feedback, quality control or any other lawful purpose.</li>
                                <li>As detailed in Section 3, contributing User Content or other information on or through the Site, is limited to individuals over 18 years old. The Site is designed and intended for adults. By contributing User Content or other content on or through the Communities, you affirm that you are over 18 years old. We will promptly delete User Content or other content associated with any account we obtain actual knowledge of that is associated with a registered user who is not at least 18 years old. If you are under 18 years old, please notify us and we will take action.</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li id="unsolicited">
                    <h3>Unsolicited Ideas</h3>
                    <p>We do not accept or consider, directly or through any TribalSquare employee or agent, unsolicited ideas of any kind, including without limitation, ideas or suggestions relating to new or improved products, enhancements, names or technologies, advertising and marketing campaigns, plans or other promotions. Do not send us (or any of our employees) any unsolicited ideas, suggestions, material, images or other work in any form (“Unsolicited Materials”). If you send us Unsolicited Materials, you understand and agree that the following terms will apply, notwithstanding any cover letter or other terms that accompany them:
                    </p>
                    <ul class="sub_point_list">
                        <li>
                            TribalSquare has no obligation to review any Unsolicited Materials, nor to keep any Unsolicited Materials confidential; and
                        </li>
                        <li>
                            TribalSquare will own, and may use and redistribute, Unsolicited Materials for any purpose without restriction and free of any obligation to acknowledge or compensate you.
                        </li>
                    </ul>
                </li>
                <li id="copyright">
                    <h3>Copyright Policy and Digital Millennium Copyright Act (DMCA)
Procedures</h3>
                    <p>TribalSquare reserves the right to terminate your or any third-party’s right to use the Site if such use infringes the copyrights of another. TribalSquare may, under appropriate circumstances and at its discretion, terminate your or any third-party’s right to access to the Site, if TribalSquare determines that you or a third-party is a repeat infringer. If you believe that any material has been posted via the Site by any third-party in a way that constitutes copyright infringement, and you would like to bring it to TribalSquare 's attention, you must provide TribalSquare 's DMCA Agent identified below with the following information: (a) an electronic or physical signature of the person authorized to act on behalf of the owner of the copyrighted work; (b) an identification of the copyrighted work and the location on the Site of the allegedly infringing work; (c) a written statement that you have a good faith belief that the disputed use is not authorized by the owner, its agent or the law; (d) your name and contact information, including telephone number and email address; and (e) a statement by you that the above information in your notice is accurate and, under penalty of perjury, that you are the copyright owner or authorized to act on the copyright owner’s behalf.
                        <br>
                        <br> The contact information for TribalSquare’s DMCA Agent for notice of claims of copyright infringement is: TribalSquare, Inc. Attn: Copyright Agent, Address Here, Atlanta, GA. 30315, email: agent@tribalsquare.com.
                    </p>
                </li>
                <li id="disclaimer">
                    <h3>Disclaimer of Warranty</h3>
                    <p>YOU EXPRESSLY AGREE THAT USE OF THE SITE IS AT YOUR SOLE RISK. NONE OF TRIBALSQUARE, ITS SUBSIDIARIES OR AFFILIATES OR ANY OF THEIR RESPECTIVE EMPLOYEES, AGENTS, MERCHANTS, THIRD-PARTY CONTENT PROVIDERS OR LICENSORS OR ANY OF THEIR OFFICERS, DIRECTORS, EMPLOYEES OR AGENTS, WARRANT THAT USE OF THE SITE WILL BE UNINTERRUPTED, SECURE, VIRUS-FREE OR ERROR FREE, NOR DO THEY MAKE ANY WARRANTY AS TO (A) THE RESULTS THAT MAY BE OBTAINED FROM USE OF THE SITE, OR (B) THE ACCURACY, COMPLETENESS OR RELIABILITY OF (I) THE CONTENT ON THE SITE, INCLUDING WITHOUT LIMITATION MERCHANT OFFERINGS, PRODUCTS OR OTHER AVAILABLE PROGRAMS, (II) DESCRIPTIONS OF MERCHANT OFFERINGS, PRODUCTS OR OTHER AVAILABLE PROGRAMS, OR (III) USER CONTENT PROVIDED THROUGH THE SITE. THE SITE AND ALL CONTENT, USER CONTENT AND OTHER INFORMATION CONTAINED ON THE SITE, MERCHANT OFFERINGS, PRODUCTS AND OTHER AVAILABLE PROGRAMS ACCESSIBLE OR AVAILABLE THROUGH THE SITE, ARE MADE ACCESSIBLE OR AVAILABLE ON AN “AS IS” AND “AS AVAILABLE” BASIS. TO THE EXTENT ALLOWED BY APPLICABLE LAW, TRIBALSQUARE HEREBY DISCLAIMS ANY AND ALL REPRESENTATIONS, WARRANTIES AND CONDITIONS, WHETHER EXPRESS OR IMPLIED, AS TO THE OPERATION OF THE SITE OR THE CONTENT, USER CONTENT OR OTHER INFORMATION CONTAINED ON THE SITE OR THE MERCHANT OFFERINGS, PRODUCTS OR OTHER AVAILABLE PROGRAMS ACCESSIBLE OR AVAILABLE THROUGH THE SITE, INCLUDING, BUT NOT LIMITED TO, THOSE OF TITLE, NON-INFRINGEMENT, MERCHANTABILITY, SUITABILITY AND FITNESS FOR A PARTICULAR PURPOSE, AS WELL AS WARRANTIES IMPLIED FROM A COURSE OF PERFORMANCE OR COURSE OF DEALING.
                    </p>
                </li>
                <li id="limitation">
                    <h3>Limitation of Liability</h3>
                    <p>IN NO EVENT SHALL TRIBALSQUARE, ITS SUBSIDIARIES OR AFFILIATES OR ANY OF THEIR RESPECTIVE EMPLOYEES, OFFICERS, DIRECTORS, AGENTS, MERCHANTS, PARTNERS, THIRD-PARTY CONTENT PROVIDERS OR LICENSORS, OR ANY OF THEIR OFFICERS, DIRECTORS, EMPLOYEES OR AGENTS, BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR PUNITIVE DAMAGES ARISING OUT OF OR RELATED TO: (A) YOUR USE OF THE SITE, THE CONTENT, USER CONTENT AND OTHER INFORMATION CONTAINED IN THE SITE; (B) YOUR INABILITY TO USE THE SITE; (C) MODIFICATION OR REMOVAL OF CONTENT SUBMITTED ON THE SITE; (D) THE MERCHANT OFFERINGS, PRODUCTS AND OTHER AVAILABLE PROGRAMS ACCESSIBLE OR AVAILABLE THROUGH THE SITE; OR (E) THESE TERMS OF USE. IN NO EVENT WILL TRIBALSQUARE’S LIABILITY IN CONNECTION WITH A MERCHANT OFFERING, PRODUCT, AND OTHER AVAILABLE PROGRAMS EXCEED THE AMOUNTS PAID FOR THE APPLICABLE VOUCHER, PRODUCT OR SERVICE. TOTAL AGGREGATE LIABILITY ARISING OUT OF, RELATED TO, OR IN CONNECTION WITH THESE TERMS OF USE SHALL NOT EXCEED THE AMOUNTS PAID BY YOU DURING THE SIX MONTHS PRECEDING THE BRINGING OF ANY CLAIM. YOU AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE SITE MUST COMMENCE WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION ACCRUES, OR THE CAUSE OF ACTION IS PERMANENTLY BARRED. BECAUSE SOME JURISDICTIONS DO NOT ALLOW LIMITATIONS ON HOW LONG AN IMPLIED WARRANTY LASTS, ALL OR A PORTION OF THE ABOVE LIMITATION MAY NOT APPLY TO YOU.
                    </p>
                </li>
                <li id="electronic">
                    <h3>Electronic Communications</h3>
                    <p>When you use the Site or send emails to TribalSquare, you are communicating with us electronically and consent to receive electronic communications related to your use of the Site. We will communicate with you by email or by posting notices on the Site. You agree that all agreements, notices, disclosures and other communications that are provided to you electronically satisfy any legal requirement that such communications be in writing. Notices from us will be considered delivered to you and effective when sent to the email address you provide on the Site or from which you otherwise email us.
                    </p>
                </li>
                <li id="websites">
                    <h3>Websites of Others</h3>
                    <p>The Site contains links to websites maintained by other parties. These links are provided solely as a convenience to you and not because we endorse or have an opinion about the contents on such websites. We expressly disclaim any representations regarding the content or accuracy of materials on such websites or the privacy practices of those websites. If you decide to access websites maintained by other parties, you do so at your own risk. We are not responsible or liable, directly or indirectly, for any damage, loss or liability caused or alleged to be caused by or in connection with any use of or reliance on any content, TribalDeals, TribalListings, TribalSitters or any other services available on or through any such linked site or resource.
                    </p>
                </li>
                <li id="indemnification">
                    <h3>Indemnification/Release</h3>
                    <p>You agree to defend, indemnify and hold harmless TribalSquare, its subsidiaries and affiliates and their respective directors, officers, employees and agents from and against all claims and expenses, including attorneys’ fees, arising out of or related to: (a) any TribalDeal or services purchased by you through the Site; (b) any User Content submitted or posted by you, in connection with the Site, or any use of the Site in violation of these Terms of Use; (c) fraud you commit or your intentional misconduct or gross negligence; or (d) your violation of any applicable U.S. or foreign law or rights of a third-party.
                        <br>
                        <br> You are solely responsible for your interactions with Merchants, babysitters, nannies, and other users of the Site. To the extent permitted under applicable laws, you hereby release TribalSquare from any and all claims or liability related to any product or service of a Merchant (or babysitter, nanny, and other users of the Site), any action or inaction by a Merchant (or babysitter, nanny, and other users of the Site), including but not limited to any harm caused to you by action or inaction of a Merchant (or babysitter, nanny, and other users of the Site), a Merchant’s, (or babysitter’s, nanny’s, and other users of the Site) failure to comply with applicable law and/or failure to abide by the terms of a TribalDeal, TribalListing or TribalSitter and any conduct, speech or User Content, whether online or offline, of any other third-party.
                    </p>
                </li>
                <li id="force">
                    <h3>Force Majeure</h3>
                    <p>TribalSquare shall be excused from performance under these Terms of Use, to the extent it is prevented or delayed from performing, in whole or in part, as a result of an event or series of events caused by or resulting from: (a) weather conditions or other elements of nature or acts of God; (b) acts of war, acts of terrorism, insurrection, riots, civil disorders or rebellion; (c) quarantines or embargoes; (d) labor strikes; (e) error or disruption to major computer hardware or networks or software failures; or (g) other causes beyond the reasonable control of TribalSquare.
                    </p>
                </li>
                <li id="assignment">
                    <h3>Assignment</h3>
                    <p>You may not assign these Terms of Use, or any rights, benefits or obligations hereunder, by operation of law or otherwise, without the express written permission of TribalSquare. Any attempted assignment that does not comply with these Terms of Use shall be null and void. TribalSquare may assign these Terms of Use, in whole or in part, to any third-party in its sole discretion.
                    </p>
                </li>
                <li id="entire">
                    <h3>Entire Agreement</h3>
                    <p>The Terms of Use, including the incorporated Terms of Sale, Privacy Statement and other terms incorporated by reference, constitutes the entire agreement and understanding between you and TribalSquare with respect to the subject matter hereof and supersedes all prior or contemporaneous communications and proposals, whether oral or written, between you and TribalSquare with respect to such subject matter.
                    </p>
                </li>
                <li id="choice">
                    <h3>Choice of Law</h3>
                    <p>Any disputes arising out of or related to these Terms of Use and/or any use by you of the Site or TribalSquare’s services shall be governed by the laws of the State of Georgia, without regard to its choice of law rules and without regard to conflicts of laws principles.
                        <br>
                        <br> If you reside in Canada, any disputes arising out of or related to these Terms of Use and/or any use by you of the Site or TribalSquare’s services shall be governed by the laws of the Province in which you reside at the time you enter into these Terms of Use, without regard to its choice of law rules and without regard to conflicts of laws principles. TribalSquare and you specifically disclaim the application of the United Nations Convention on Contracts for the International Sale of Goods as that Convention may be incorporated into applicable law.
                    </p>
                </li>
                <li id="dispute">
                    <h3>Dispute Resolution</h3>
                    <ol type="A" class="sub_point_list">
                        <li><b><u>Binding Arbitration.</u> Except as specifically stated herein, any disputeor claim between you and TribalSquare arising out of, or relating in anyway to, the Terms of Use, the Site or your use of the Site, or anyProducts, Merchant Offerings or services offered or distributed throughthe Site (“Disputes”) shall be resolved exclusively by final, bindingarbitration; except that you may bring a qualifying claim over a Disputein a small claims court in Cook County, Illinois. By virtue of thisAgreement (defined below), you and TribalSquare are each giving up theright to go to court and have a Dispute heard by a judge or jury (exceptas otherwise set forth in this Section 24(a) or Section 24(d)).</b>The provisions of this Section 23 shall constitute your and TribalSquare’s written agreement to arbitrate Disputes under the Federal Arbitration Act (<b>“Agreement”</b>). Any modification to this Agreement shall be in writing and signed by you and TribalSquare. The arbitration will be administered by the American Arbitration Association (<b>“AAA”</b>) and conducted before a single arbitrator pursuant to its rules, including the AAA’s Supplementary Procedures for Consumer-Related Disputes, available at <a href="http://www.adr.org" target="_blank">http://www.adr.org</a> or by calling 800-778-7879. The arbitrator will apply and be bound by this Agreement, apply applicable law and the facts, and issue a reasoned award.
                            <br>
                            <br>To begin an arbitration proceeding, you must comply with the limitations provision set forth in Section 24(e) and submit the Dispute by utilizing the forms available at <a href="http://www.adr.org" target="_blank">http://www.adr.org</a>, and simultaneously sending a copy of the completed form to the following address: C T Corporation System, 208 S. LaSalle Street, Suite 814, Chicago, IL 60604. Payment of all filing, administration and arbitrator fees will be governed by the AAA's rules. TribalSquare will reimburse those fees for Disputes totaling less than $100 unless the arbitrator determines the Dispute is frivolous. Likewise, TribalSquare will not seek attorneys' fees and costs in arbitration unless the arbitrator determines the Dispute is frivolous. The arbitration will be conducted based upon written submissions unless you request and/or the arbitrator determines that a telephone or in-person hearing is necessary. If the arbitrator grants the request or determines an in-person hearing is necessary, the hearing will proceed in Chicago, Illinois, unless the arbitrator determines or we agree that the matter should proceed in the county in which you reside.</li>
                        <br>
                        <li><b><u>No Class Action Matters</u>. We each agree that we shall bring any Disputeagainst the other in our respective individual capacities and not as aplaintiff or class member in any purported class, representativeproceeding or as an association. In addition, we each agree that Disputesshall be arbitrated only on an individual basis and not in a class,consolidated or representative action. The arbitrator does not have thepower to vary these provisions.</b></li>
                        <br>
                        <li><b><u>Choice of Law and Forum; No Jury Trial.</u></b> If for any reason a Dispute proceeds in court: (i) you agree that any such Dispute may only be instituted in a state or federal court in Cook County, Illinois; (ii) you and TribalSquare irrevocably consent and submit to the exclusive personal jurisdiction and venue of such courts for resolution of such Disputes; (iii) you and TribalSquare agree that the Federal Arbitration Act, the AAA rules, applicable federal law and the laws of the State of Illinois, without regard to principles of conflicts of law, will govern this Agreement and any Disputes; and (iv) you and TribalSquare agree to waive any right to a trial by jury.</li>
                        <br>
                        <li><b><u>Injunctive Relief.</u></b> Notwithstanding anything to the contrary in this Agreement, either party may bring suit in court seeking an injunction or other equitable relief arising out of or relating to the infringement of a party’s intellectual property or any conduct that violates Section 7 (“Your Conduct”) of the Terms of Use.</li>
                        <br>
                        <li><b><u>Time Limitations.</u></b> If either of us wants to assert a Dispute against the other, the party with a Dispute must institute arbitration within one (1) year from the date the Dispute arose. Absent commencing the arbitration within one (1) year from the date the Dispute arose, the Dispute(s) will be forever barred.</li>
                        <br>
                        <li>
                            <b><u>Severability.</u></b> With the exception of Section 24(b) above, if any part of this Section 24 is ruled to be unenforceable, then the balance of this Section 24 shall remain in full effect and construed and enforced as if the portion ruled unenforceable were not contained herein.
                        </li>
                    </ol>
                </li>
                <li id="additional">
                    <h3>Additional Disclosures</h3>
                    <p>
                        No waiver by either you or TribalSquare of any breach or default or failure to exercise any right allowed under these Terms of Use is a waiver of any preceding or subsequent breach or default or a waiver or forfeiture of any similar or future rights under our Terms of Use. The section headings used herein are for convenience only and shall be of no legal force or effect. If a court of competent jurisdiction holds any provision of our Agreement invalid, such invalidity shall not affect the enforceability of any other provisions contained in these Terms of Use, and the remaining portions of our Agreement shall continue in full force and effect.
                        <br>
                        <br> You are contracting with TribalSquare, Inc. Correspondence should be directed to: TribalSquare, Inc.,  <a target="" href="mailto:info@tribalsquare.com">info@tribalsquare.com.</a>
                        <br>
                        <br> The provisions of these Terms of Use apply equally to and are for the benefit of TribalSquare, its subsidiaries, affiliates, Merchants and its third-party content providers and licensors, and each shall have the right to assert and enforce such provisions directly.
                    </p>
                </li>
            </ol>
        <p></p>
    </div>

<div class="push"></div> <!-- Add for Sticky Footer -->
</div> <!-- Wrapper End -->


@stop
<style type="text/css">
.wrapper {
  min-height: 100%;
  height: auto !important;
  height: 100%;
}
</style>