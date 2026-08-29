/**
 * TURTLE MAARKS — CLIENT-SIDE PRODUCT REPOSITORY & CARD ENGINE
 *
 * PHP twin: includes/data/products.php  (data)
 *           includes/product-card.php   (markup — keep renderCard() identical)
 *
 * The server renders the first paint of every grid with includes/product-card.php.
 * This file only re-renders cards for live interactions: filters, sort, search,
 * wishlist and compare. Any change to the card must be made in BOTH places.
 */

const TURTLE_PRODUCTS = [
    {
        "id": "tm-widex-magnify-50-mbr3d-mbte-hearing-aids",
        "name": "Widex Magnify 50 MBR3D mBTE Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 35500,
        "mrp": 41900,
        "channels": 8,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-magnify-50-mbr3d-mbte-hearing-aids.png",
        "rating": 4.8,
        "reviews": 37,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": true,
        "isFeatured": true
    },
    {
        "id": "tm-widex-magnify-mrbo-30-hearing-aids",
        "name": "Widex Magnify MRBO 30 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 25500,
        "mrp": 30100,
        "channels": 6,
        "rechargeable": false,
        "bluetooth": false,
        "image": "assets/images/products/widex-magnify-mrbo-30-hearing-aids.jpg",
        "rating": 4.7,
        "reviews": 49,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": true
    },
    {
        "id": "tm-widex-kit-moment-110-mbr3d-hearing-aid",
        "name": "Widex Kit Moment 110 MBR3D Hearing Aid",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 140000,
        "mrp": 165200,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-kit-moment-110-mbr3d-hearing-aid.png",
        "rating": 4.9,
        "reviews": 44,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": true
    },
    {
        "id": "tm-widex-evoke-440-ric-hearing-aids",
        "name": "Widex Evoke 440 RIC Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "RIC",
        "price": 200000,
        "mrp": 236000,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-evoke-440-ric-hearing-aids.jpg",
        "rating": 4.7,
        "reviews": 32,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": true,
        "isFeatured": true
    },
    {
        "id": "tm-widex-kit-moment-220-hearing-aids",
        "name": "Widex Kit Moment 220 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 110000,
        "mrp": 129800,
        "channels": 20,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-kit-moment-220-hearing-aids.png",
        "rating": 4.7,
        "reviews": 50,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": true
    },
    {
        "id": "tm-widex-moment-330-bte-hearing-aids",
        "name": "Widex Moment 330 BTE Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 260000,
        "mrp": 306800,
        "channels": 6,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-moment-330-bte-hearing-aids.png",
        "rating": 4.7,
        "reviews": 25,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": true
    },
    {
        "id": "tm-widex-enjoy-100-hearing-aids",
        "name": "Widex Enjoy 100 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 45990,
        "mrp": 54300,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-enjoy-100-hearing-aids.webp",
        "rating": 4.7,
        "reviews": 37,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": true,
        "isFeatured": true
    },
    {
        "id": "tm-widex-evoke-110-hearing-aids",
        "name": "Widex Evoke 110 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 65000,
        "mrp": 76700,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-evoke-110-hearing-aids.jpg",
        "rating": 4.7,
        "reviews": 34,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": true
    },
    {
        "id": "tm-widex-enjoy-30-hearing-aids",
        "name": "Widex Enjoy 30 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 23990,
        "mrp": 28300,
        "channels": 6,
        "rechargeable": false,
        "bluetooth": false,
        "image": "assets/images/products/widex-enjoy-30-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 35,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-widex-enjoy-50-hearing-aids",
        "name": "Widex Enjoy 50 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 34990,
        "mrp": 41300,
        "channels": 8,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-enjoy-50-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 21,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-widex-moment-sheer-mrr4d-ric-rechargeable-hearing-aid",
        "name": "Widex Moment Sheer MRR4D RIC Rechargeable Hearing Aid",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "RIC",
        "price": 700000,
        "mrp": 826000,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/widex-moment-sheer-mrr4d-ric-rechargeable-hearing-aid.png",
        "rating": 4.9,
        "reviews": 47,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-widex-magnify-100-bte-hearing-aid",
        "name": "Widex Magnify 100 BTE Hearing Aid",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 48500,
        "mrp": 57200,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-magnify-100-bte-hearing-aid.png",
        "rating": 4.7,
        "reviews": 33,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-widex-evoke-220-hearing-aids",
        "name": "Widex Evoke 220 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 80000,
        "mrp": 94400,
        "channels": 20,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-evoke-220-hearing-aids.png",
        "rating": 4.8,
        "reviews": 31,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-widex-evoke-330-hearing-aids",
        "name": "Widex Evoke 330 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 140000,
        "mrp": 165200,
        "channels": 6,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-evoke-330-hearing-aids.jpg",
        "rating": 4.7,
        "reviews": 32,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-widex-kit-magnify-hearing-aid",
        "name": "Widex Kit Magnify Hearing Aid",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 115000,
        "mrp": 135700,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-kit-magnify-hearing-aid.png",
        "rating": 4.7,
        "reviews": 30,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-widex-kit-moment-110-hearing-aids",
        "name": "Widex Kit Moment 110 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 70000,
        "mrp": 82600,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-kit-moment-110-hearing-aids.png",
        "rating": 4.7,
        "reviews": 39,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-widex-kit-moment-440-hearing-aids",
        "name": "Widex Kit Moment 440 Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "BTE",
        "price": 360000,
        "mrp": 424800,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-kit-moment-440-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 52,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-widex-kit-moment-smartrict-hearing-aids",
        "name": "Widex Kit Moment Smartrict Hearing Aids",
        "brand": "Widex",
        "brandOrigin": "Denmark",
        "style": "RIC",
        "price": 750000,
        "mrp": 885000,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/widex-kit-moment-smartrict-hearing-aids.png",
        "rating": 4.7,
        "reviews": 20,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "ZeroDelay\u2122 PureSound",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-20-ric-hearing-aid",
        "name": "Starkey Genesis Ai 20 RIC Hearing Aid",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "RIC",
        "price": 250000,
        "mrp": 295000,
        "channels": 20,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-20-ric-hearing-aid.webp",
        "rating": 4.9,
        "reviews": 52,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-24-mric-hearing-aids",
        "name": "Starkey Genesis AI 24 MRIC Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "RIC",
        "price": 380000,
        "mrp": 448400,
        "channels": 24,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-24-mric-hearing-aids.jpg",
        "rating": 4.9,
        "reviews": 42,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-24-itc-r-hearing-aids",
        "name": "Starkey Genesis AI 24 ITC R Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "ITC",
        "price": 400000,
        "mrp": 472000,
        "channels": 24,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-24-itc-r-hearing-aids.png",
        "rating": 4.7,
        "reviews": 38,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-16-itc-r-hearing-aid",
        "name": "Starkey Genesis AI 16 ITC R Hearing Aid",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "ITC",
        "price": 200000,
        "mrp": 236000,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-16-itc-r-hearing-aid.png",
        "rating": 4.7,
        "reviews": 28,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-24-cic-hearing-aids",
        "name": "Starkey Genesis AI 24 CIC Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "CIC",
        "price": 380000,
        "mrp": 448400,
        "channels": 24,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-24-cic-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 49,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-20-cic-hearing-aids",
        "name": "Starkey Genesis AI 20 CIC Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "CIC",
        "price": 260000,
        "mrp": 306800,
        "channels": 20,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-20-cic-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 35,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-16-cic-hearing-aids",
        "name": "Starkey Genesis AI 16 CIC Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "CIC",
        "price": 180000,
        "mrp": 212400,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-16-cic-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 23,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-20-mric-r-rechargeable-hearing-aid",
        "name": "Starkey Genesis AI 20 MRIC R Rechargeable Hearing Aid",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "RIC",
        "price": 260000,
        "mrp": 306800,
        "channels": 20,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-20-mric-r-rechargeable-hearing-aid.jpg",
        "rating": 4.9,
        "reviews": 53,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-16-mric-r-hearing-aids",
        "name": "Starkey Genesis AI 16 MRIC R Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "RIC",
        "price": 180000,
        "mrp": 212400,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-16-mric-r-hearing-aids.webp",
        "rating": 4.8,
        "reviews": 32,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-24-ric-312-hearing-aids",
        "name": "Starkey Genesis AI 24 RIC 312 Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "RIC",
        "price": 370000,
        "mrp": 436600,
        "channels": 24,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-24-ric-312-hearing-aids.webp",
        "rating": 4.9,
        "reviews": 20,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-24-ric-rt-hearing-aids",
        "name": "Starkey Genesis AI 24 RIC RT Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "RIC",
        "price": 390000,
        "mrp": 460200,
        "channels": 24,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-24-ric-rt-hearing-aids.webp",
        "rating": 4.9,
        "reviews": 30,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-starkey-genesis-ai-20-itc-r-hearing-aids",
        "name": "Starkey Genesis AI 20 ITC R Hearing Aids",
        "brand": "Starkey",
        "brandOrigin": "USA",
        "style": "ITC",
        "price": 280000,
        "mrp": 330400,
        "channels": 20,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/starkey-genesis-ai-20-itc-r-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 53,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Deep Neural Network AI",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-moxi-b-r-hearing-aids",
        "name": "Unitron Moxi B-R Hearing Aids",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 84000,
        "mrp": 99100,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/unitron-moxi-b-r-hearing-aids.jpg",
        "rating": 4.9,
        "reviews": 16,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-stride-v-up-hearing-aids",
        "name": "Unitron Stride V-UP Hearing Aids",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 80000,
        "mrp": 94400,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/unitron-stride-v-up-hearing-aids.jpg",
        "rating": 4.7,
        "reviews": 40,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-stride-v-pr-hearing-aids",
        "name": "Unitron Stride V-PR Hearing Aids",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 190000,
        "mrp": 224200,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/unitron-stride-v-pr-hearing-aids.jpg",
        "rating": 4.7,
        "reviews": 22,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-insera-312-omni-in-the-ear-hearing-aid",
        "name": "Unitron Insera 312 Omni In The Ear Hearing Aid",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "ITE",
        "price": 30000,
        "mrp": 35400,
        "channels": 12,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/unitron-insera-312-omni-in-the-ear-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 39,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-insera-b-312-nw-omni-hearing-aids",
        "name": "Unitron Insera B-312 NW Omni Hearing Aids",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 39000,
        "mrp": 46000,
        "channels": 12,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/unitron-insera-b-312-nw-omni-hearing-aids.jpg",
        "rating": 4.9,
        "reviews": 34,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-moxi-v5-r-hearing-aid",
        "name": "Unitron Moxi V5 R Hearing Aid",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 95000,
        "mrp": 112100,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/unitron-moxi-v5-r-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 33,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-moxi-v7-r-hearing-aid",
        "name": "Unitron Moxi V7 R Hearing Aid",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 175000,
        "mrp": 206500,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/unitron-moxi-v7-r-hearing-aid.jpg",
        "rating": 4.7,
        "reviews": 50,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-insera-b-10-nw-omni-hearing-aids",
        "name": "Unitron Insera B-10 NW Omni Hearing Aids",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 39000,
        "mrp": 46000,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/unitron-insera-b-10-nw-omni-hearing-aids.jpg",
        "rating": 4.7,
        "reviews": 40,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-moxi-v3-r-hearing-aid",
        "name": "Unitron Moxi V3 R Hearing Aid",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 57000,
        "mrp": 67300,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/unitron-moxi-v3-r-hearing-aid.jpg",
        "rating": 4.7,
        "reviews": 47,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-stride-b-up-hearing-aids",
        "name": "Unitron Stride B-UP Hearing Aids",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 25000,
        "mrp": 29500,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/unitron-stride-b-up-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 34,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-moxi-b-312-receiver-in-canal-hearing-aids",
        "name": "Unitron Moxi B 312 Receiver In Canal Hearing Aids",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "BTE",
        "price": 170000,
        "mrp": 200600,
        "channels": 12,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/unitron-moxi-b-312-receiver-in-canal-hearing-aids.jpg",
        "rating": 4.8,
        "reviews": 41,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-l70-up-bte-hearing-aid",
        "name": "Phonak Naida L70-UP BTE Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 175000,
        "mrp": 206500,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-l70-up-bte-hearing-aid.jpg",
        "rating": 4.9,
        "reviews": 18,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-l90-up-bte-hearing-aid",
        "name": "Phonak Naida L90-UP BTE Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 270000,
        "mrp": 318600,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-l90-up-bte-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 34,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-p50-up-hearing-aid",
        "name": "Phonak Naida P50-UP Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 92500,
        "mrp": 109200,
        "channels": 8,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-p50-up-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 25,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-p90-up-hearing-aid",
        "name": "Phonak Naida P90-UP Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 250000,
        "mrp": 295000,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-p90-up-hearing-aid.jpg",
        "rating": 4.9,
        "reviews": 42,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-l50-up-bte-hearing-aid",
        "name": "Phonak Naida L50-UP BTE Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 100000,
        "mrp": 118000,
        "channels": 8,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-l50-up-bte-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 45,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-p30-up-hearing-aid",
        "name": "Phonak Naida P30 UP Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 48500,
        "mrp": 57200,
        "channels": 6,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-p30-up-hearing-aid.jpg",
        "rating": 4.9,
        "reviews": 49,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-p70-up-hearing-aid",
        "name": "Phonak Naida P70-UP Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 161000,
        "mrp": 190000,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-p70-up-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 36,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-phonak-naida-l30-up-bte-hearing-aid",
        "name": "Phonak Naida L30-UP BTE Hearing Aid",
        "brand": "Phonak",
        "brandOrigin": "Switzerland",
        "style": "BTE",
        "price": 54500,
        "mrp": 64300,
        "channels": 6,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/phonak-naida-l30-up-bte-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 47,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "AutoSense OS & Roger Ready",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-resound-nexia-rie-hearing-aid",
        "name": "Resound NEXIA RIE Hearing Aid",
        "brand": "ReSound",
        "brandOrigin": "Denmark",
        "style": "RIC",
        "price": 183576,
        "mrp": 216600,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/resound-nexia-rie-hearing-aid.jpg",
        "rating": 4.7,
        "reviews": 22,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Organic Hearing & Auracast",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-resound-omnia-4-mini-ric-rechargeable-hearing-aid",
        "name": "Resound Omnia 4 Mini RIC Rechargeable Hearing Aid",
        "brand": "ReSound",
        "brandOrigin": "Denmark",
        "style": "RIC",
        "price": 94995,
        "mrp": 112100,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/resound-omnia-4-mini-ric-rechargeable-hearing-aid.jpg",
        "rating": 4.9,
        "reviews": 43,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Organic Hearing & Auracast",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-resound-gn-nexia-760s-microrie-rechargeable-hearing-aid",
        "name": "Resound GN NEXIA 760s MicroRIE Rechargeable Hearing Aid",
        "brand": "ReSound",
        "brandOrigin": "Denmark",
        "style": "RIC",
        "price": 459995,
        "mrp": 542800,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/resound-gn-nexia-760s-microrie-rechargeable-hearing-aid.jpg",
        "rating": 4.9,
        "reviews": 36,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Organic Hearing & Auracast",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-resound-nexia-560s-cros-microrie-rechargeable-hearing-aid",
        "name": "Resound NEXIA 560S CROS MicroRIE Rechargeable Hearing Aid",
        "brand": "ReSound",
        "brandOrigin": "Denmark",
        "style": "RIC",
        "price": 184995,
        "mrp": 218300,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/resound-nexia-560s-cros-microrie-rechargeable-hearing-aid.jpg",
        "rating": 4.7,
        "reviews": 34,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Organic Hearing & Auracast",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-vesuvio-xtm-xp-p4-hearing-aid",
        "name": "Vesuvio XTM XP P4 Hearing Aid",
        "brand": "Vesuvio",
        "brandOrigin": "Germany",
        "style": "BTE",
        "price": 16990,
        "mrp": 20000,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/vesuvio-xtm-xp-p4-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 22,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "German Acoustic Core",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-vesuvio-stf-p-t3-hearing-aid",
        "name": "Vesuvio STF P T3 Hearing Aid",
        "brand": "Vesuvio",
        "brandOrigin": "Germany",
        "style": "BTE",
        "price": 9990,
        "mrp": 11800,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/vesuvio-stf-p-t3-hearing-aid.jpg",
        "rating": 4.7,
        "reviews": 24,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "German Acoustic Core",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "tm-vesuvio-xtm-p-p4-hearing-aid",
        "name": "Vesuvio XTM P P4 Hearing Aid",
        "brand": "Vesuvio",
        "brandOrigin": "Germany",
        "style": "BTE",
        "price": 16990,
        "mrp": 20000,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/vesuvio-xtm-p-p4-hearing-aid.jpg",
        "rating": 4.7,
        "reviews": 27,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "German Acoustic Core",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-vesuvio-stf-xp-t3-hearing-aid",
        "name": "Vesuvio STF XP T3 Hearing Aid",
        "brand": "Vesuvio",
        "brandOrigin": "Germany",
        "style": "BTE",
        "price": 9990,
        "mrp": 11800,
        "channels": 16,
        "rechargeable": false,
        "bluetooth": true,
        "image": "assets/images/products/vesuvio-stf-xp-t3-hearing-aid.jpg",
        "rating": 4.8,
        "reviews": 28,
        "category": "hearing-aids",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "German Acoustic Core",
        "isPopular": false,
        "isFeatured": false
    },
    {
        "id": "tm-unitron-moxi-rs-hearing-aid-charger",
        "name": "Unitron Moxi RS Hearing Aid Charger",
        "brand": "Unitron",
        "brandOrigin": "Canada",
        "style": "Accessory",
        "price": 8500,
        "mrp": 10000,
        "channels": 16,
        "rechargeable": true,
        "bluetooth": true,
        "image": "assets/images/products/unitron-moxi-rs-hearing-aid-charger.jpg",
        "rating": 4.8,
        "reviews": 46,
        "category": "accessories",
        "techLevel": "Flagship AI",
        "badge": "15% OFF",
        "featureHighlight": "Integra OS Acoustic Auto",
        "isPopular": true,
        "isFeatured": false
    },
    {
        "id": "bat1",
        "name": "Rayovac Extra Advanced Hearing Aid Batteries (Pack of 60)",
        "brand": "Rayovac",
        "brandOrigin": "UK",
        "style": "Accessory",
        "price": 2400,
        "mrp": 3000,
        "channels": 0,
        "rechargeable": false,
        "bluetooth": false,
        "image": "assets/images/batteries.webp",
        "rating": 5,
        "reviews": 142,
        "category": "batteries",
        "techLevel": "Zinc Air",
        "badge": "20% OFF",
        "featureHighlight": "Size 10 / 312 / 13 / 675",
        "isPopular": true,
        "isFeatured": true
    }
];

/**
 * TURTLE PRODUCTS — UNIFIED COMPONENT CONTROLLER
 */
const TurtleProducts = {
  products: TURTLE_PRODUCTS,

  getAll() {
    return this.products;
  },

  getById(id) {
    return this.products.find(p => p.id === id) || null;
  },

  filter(criteria = {}) {
    let list = [...this.products];

    if (criteria.brand) {
      const brands = Array.isArray(criteria.brand) ? criteria.brand : [criteria.brand];
      list = list.filter(p => brands.map(b => b.toLowerCase()).includes(p.brand.toLowerCase()));
    }

    if (criteria.style) {
      const styles = Array.isArray(criteria.style) ? criteria.style : [criteria.style];
      list = list.filter(p => styles.map(s => s.toLowerCase()).includes(p.style.toLowerCase()));
    }

    if (criteria.category) {
      const cats = Array.isArray(criteria.category) ? criteria.category : [criteria.category];
      list = list.filter(p => cats.map(c => c.toLowerCase()).includes((p.category || '').toLowerCase()));
    }

    if (criteria.isPopular) {
      list = list.filter(p => p.isPopular);
    }

    if (criteria.isFeatured) {
      list = list.filter(p => p.isFeatured);
    }

    if (criteria.rechargeableOnly) {
      list = list.filter(p => p.rechargeable);
    }

    if (criteria.bluetoothOnly) {
      list = list.filter(p => p.bluetooth);
    }

    if (criteria.minPrice !== undefined) {
      list = list.filter(p => p.price >= criteria.minPrice);
    }

    if (criteria.maxPrice !== undefined) {
      list = list.filter(p => p.price <= criteria.maxPrice);
    }

    if (criteria.search) {
      const q = criteria.search.trim().toLowerCase();
      list = list.filter(p => 
        p.name.toLowerCase().includes(q) ||
        p.brand.toLowerCase().includes(q) ||
        p.style.toLowerCase().includes(q) ||
        (p.techLevel && p.techLevel.toLowerCase().includes(q)) ||
        (p.featureHighlight && p.featureHighlight.toLowerCase().includes(q))
      );
    }

    if (criteria.limit && criteria.limit > 0) {
      list = list.slice(0, criteria.limit);
    }

    return list;
  },

  /**
   * CANONICAL LUXURY PRODUCT CARD GENERATOR (ONLY ONE CODE USED EVERYWHERE)
   * @param {Object} p Product Data Object
   * @param {Object} options Configuration (colClass, showCompare, isWishlistPage, etc.)
   * @returns {string} HTML markup string
   */
  renderCard(p, options = {}) {
    if (!p) return '';

    const colClass = options.colClass || 'col-xl-3 col-lg-4 col-md-6';
    const savings = Math.max(0, (p.mrp || p.price) - p.price);
    const savePercent = p.mrp > p.price ? Math.round(((p.mrp - p.price) / p.mrp) * 100) : 0;
    const badgeText = p.badge || (savePercent > 0 ? `${savePercent}% OFF` : 'Authorized');
    
    // Check if saved in wishlist
    const wishlist = (typeof localStorage !== 'undefined') 
      ? JSON.parse(localStorage.getItem('turtle_wishlist') || '[]') 
      : [];
    const isWishlisted = wishlist.some(i => i.id === p.id);

    // Escape single quotes in names for onclick handlers
    const safeName = p.name.replace(/'/g, "\\'");
    const safeBrand = (p.brand || 'Turtle Maarks').replace(/'/g, "\\'");
    const safeImage = p.image || 'assets/images/hearing-aid/ric.webp';

    return `
      <div class="${colClass}">
        <div class="tm-product-card" data-product-id="${p.id}">
          
          <!-- Top Floating Actions & Badges -->
          <div class="tm-product-media">
            <span class="tm-product-save-badge">${badgeText}</span>
            
            <div class="tm-product-actions-group">
              <button type="button" class="tm-product-action-btn ${isWishlisted ? 'active' : ''}" 
                data-wishlist-id="${p.id}" 
                onclick="Wishlist.toggle({id:'${p.id}', name:'${safeName}', brand:'${safeBrand}', price:${p.price}, mrp:${p.mrp || p.price}, image:'${safeImage}'})" 
                title="${isWishlisted ? 'Remove from Wishlist' : 'Add to Wishlist'}"
                aria-label="Wishlist">
                <i class="bi ${isWishlisted ? 'bi-heart-fill text-danger' : 'bi-heart'}"></i>
              </button>

              <button type="button" class="tm-product-action-btn" 
                onclick="Compare.toggle({id:'${p.id}', name:'${safeName}', brand:'${safeBrand}', price:${p.price}, image:'${safeImage}', style:'${p.style || 'Digital'}', channels:'${p.channels || 0} Channels'})" 
                title="Compare Specifications"
                aria-label="Compare">
                <i class="bi bi-arrow-left-right"></i>
              </button>
            </div>

            <a href="product-detail.php?id=${p.id}" class="tm-product-img-wrap d-block">
              <img src="${safeImage}" alt="${p.name}" class="tm-product-img" loading="lazy">
            </a>
          </div>

          <!-- Card Content Body -->
          <div class="tm-product-body">
            
            <!-- Brand Tag & Rating -->
            <div class="tm-product-brand-tag">
              <span class="tm-brand-name"><i class="bi bi-shield-check text-orange me-1"></i>${p.brand} <span class="tm-origin-text">• ${p.brandOrigin || 'Global'}</span></span>
              <span class="tm-rating-chip"><i class="bi bi-star-fill text-warning"></i> ${(p.rating || 4.9).toFixed(1)} <span class="text-muted tm-reviews-count">(${p.reviews || 20})</span></span>
            </div>

            <!-- Title -->
            <h6 class="tm-product-title">
              <a href="product-detail.php?id=${p.id}" title="${p.name}">${p.name}</a>
            </h6>

            <!-- Tech Spec Chips -->
            <div class="tm-product-specs-chips">
              ${p.style ? `<span class="tm-spec-chip tm-spec-style"><i class="bi bi-soundwave"></i> ${p.style}</span>` : ''}
              ${p.rechargeable ? `<span class="tm-spec-chip tm-spec-recharge"><i class="bi bi-battery-charging text-success"></i> Rechargeable</span>` : ''}
              ${p.bluetooth ? `<span class="tm-spec-chip tm-spec-bt"><i class="bi bi-bluetooth text-primary"></i> Bluetooth</span>` : ''}
              ${p.channels ? `<span class="tm-spec-chip tm-spec-channels"><i class="bi bi-cpu"></i> ${p.channels} Ch</span>` : ''}
              ${p.featureHighlight ? `<span class="tm-spec-chip tm-spec-feature">${p.featureHighlight}</span>` : ''}
            </div>

            <!-- Pricing & Add to Cart Row -->
            <div class="tm-product-price-row">
              <div>
                <div class="tm-product-sale-price">₹${p.price.toLocaleString('en-IN')}</div>
                ${p.mrp && p.mrp > p.price ? `<div class="tm-product-mrp">MRP: ₹${p.mrp.toLocaleString('en-IN')}</div>` : ''}
              </div>
              <button type="button" class="tm-product-btn-cart" 
                onclick="Cart.addItem({id:'${p.id}', name:'${safeName}', brand:'${safeBrand}', price:${p.price}, mrp:${p.mrp || p.price}, image:'${safeImage}'})" title="Add to Cart">
                <i class="bi bi-cart-plus-fill"></i> Add to Cart
              </button>
            </div>

          </div>

        </div>
      </div>
    `;
  },

  /**
   * Render list of products into a DOM container
   */
  renderGrid(containerOrSelector, products, options = {}) {
    const container = typeof containerOrSelector === 'string' 
      ? document.querySelector(containerOrSelector) 
      : containerOrSelector;
    
    if (!container) return;

    if (!products || products.length === 0) {
      container.innerHTML = `
        <div class="col-12 text-center py-5">
          <i class="bi bi-search text-muted fs-1 mb-2 d-block"></i>
          <h5 class="fw-bold text-navy">No products matching this selection</h5>
          <p class="text-secondary small">Please try another filter or category.</p>
        </div>
      `;
      return;
    }

    container.innerHTML = products.map(p => this.renderCard(p, options)).join('');

    // Re-bind wishlist active state
    if (typeof Wishlist !== 'undefined' && Wishlist.updateIcons) {
      Wishlist.updateIcons();
    }
  },

  /**
   * Auto-initialize all declarative containers on DOM load
   */
  init() {
    // 1. Containers with data-tm-products (e.g. data-tm-products="popular", data-tm-products="invisible", data-tm-products="brand:phonak")
    document.querySelectorAll('[data-tm-products]').forEach(el => {
      const type = el.getAttribute('data-tm-products');
      const limit = parseInt(el.getAttribute('data-tm-limit') || '4', 10);
      const colClass = el.getAttribute('data-tm-col') || 'col-xl-3 col-lg-4 col-md-6';
      
      let list = [];
      if (type === 'popular') {
        list = this.filter({ isPopular: true, limit });
      } else if (type === 'invisible') {
        list = this.filter({ style: ['IIC', 'CIC'], limit });
      } else if (type === 'rechargeable') {
        list = this.filter({ rechargeableOnly: true, limit });
      } else if (type === 'bte') {
        list = this.filter({ style: 'BTE', limit });
      } else if (type === 'chargers' || type === 'accessories') {
        list = this.filter({ category: ['chargers', 'batteries'], limit });
      } else if (type.startsWith('brand:')) {
        const brand = type.replace('brand:', '');
        list = this.filter({ brand, limit });
      } else {
        list = this.filter({ limit });
      }

      this.renderGrid(el, list, { colClass });
    });

    // 2. Interactive tab showcase controller (for homepage tabbed featured cards)
    this.initInteractiveTabs();

    // 3. Interactive brand switcher controller (for homepage brand ecosystem)
    this.initBrandSwitchers();
  },

  initInteractiveTabs() {
    const tabButtons = document.querySelectorAll('[data-tm-filter-tab]');
    const targetGrid = document.getElementById('tmInteractiveFeaturedGrid');
    if (!tabButtons.length || !targetGrid) return;

    tabButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        tabButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filterKey = btn.getAttribute('data-tm-filter-tab');
        let filtered = [];

        if (filterKey === 'all' || filterKey === 'popular') {
          filtered = this.filter({ isPopular: true, limit: 8 });
        } else if (filterKey === 'invisible') {
          filtered = this.filter({ style: ['IIC', 'CIC'], limit: 8 });
        } else if (filterKey === 'rechargeable') {
          filtered = this.filter({ rechargeableOnly: true, limit: 8 });
        } else if (filterKey === 'bte') {
          filtered = this.filter({ style: 'BTE', limit: 8 });
        } else if (filterKey === 'accessories') {
          filtered = this.filter({ category: ['chargers', 'batteries'], limit: 8 });
        }

        // Smooth transition effect
        targetGrid.style.opacity = '0.3';
        targetGrid.style.transform = 'translateY(10px)';
        targetGrid.style.transition = 'all 0.25s ease';

        setTimeout(() => {
          this.renderGrid(targetGrid, filtered, { colClass: 'col-xl-3 col-lg-4 col-md-6 mb-3' });
          targetGrid.style.opacity = '1';
          targetGrid.style.transform = 'translateY(0)';
        }, 150);
      });
    });
  },

  initBrandSwitchers() {
    const brandTabs = document.querySelectorAll('[data-tm-brand-tab]');
    const brandGrid = document.getElementById('tmBrandShowcaseGrid');
    const brandNameEl = document.getElementById('tmActiveBrandName');
    const brandUspEl = document.getElementById('tmActiveBrandUsp');
    const brandOriginEl = document.getElementById('tmActiveBrandOrigin');
    const brandViewAllBtn = document.getElementById('tmBrandViewAllBtn');

    if (!brandTabs.length || !brandGrid) return;

    const brandMetadata = {
      'Phonak': { origin: 'Stäfa, Switzerland', usp: 'Pioneers in Real-Time AI Sound Processing & DeepSonic™ Neural Chips', tag: 'Swiss Acoustic Engineering' },
      'Oticon': { origin: 'Smørum, Denmark', usp: 'BrainHearing™ & Deep Neural Network 4D User Intent Sensors', tag: 'Danish BrainHearing™' },
      'ReSound': { origin: 'Ballerup, Denmark', usp: 'Organic Hearing with Next-Gen Bluetooth LE Auracast™ Broadcast Audio', tag: 'Auracast™ Pioneers' },
      'Signia': { origin: 'Erlangen, Germany', usp: 'IntegratedXperience (IX) Real-Time Multi-Beam Conversation Tracking', tag: 'German Precision Engineering' },
      'Widex': { origin: 'Lynge, Denmark', usp: 'PureSound™ Zero-Delay (0.5ms) Natural Distortion-Free Audio Architecture', tag: 'PureSound™ Zero-Delay' },
      'Starkey': { origin: 'Minnesota, USA', usp: 'Genesis AI Neuro-Sound Processing with Deep Neural Networks & Health Tracking', tag: 'American Neuro-AI' },
      'Unitron': { origin: 'Kitchener, Canada', usp: 'SoundCore™ Conversation Focus & HyperFocus Speech in Loud Background Noise', tag: 'Canadian Spatial Acoustics' }
    };

    brandTabs.forEach(tab => {
      tab.addEventListener('click', (e) => {
        e.preventDefault();
        brandTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        const brand = tab.getAttribute('data-tm-brand-tab');
        const meta = brandMetadata[brand] || { origin: 'Global', usp: 'Authorized Global Hearing Solutions', tag: 'Authorized Partner' };

        if (brandNameEl) brandNameEl.textContent = brand;
        if (brandUspEl) brandUspEl.textContent = meta.usp;
        if (brandOriginEl) brandOriginEl.textContent = meta.origin;
        if (brandViewAllBtn) {
          brandViewAllBtn.href = `products.php?brand=${encodeURIComponent(brand)}`;
          brandViewAllBtn.innerHTML = `Explore All ${brand} Models <i class="bi bi-arrow-right"></i>`;
        }

        const brandProducts = this.filter({ brand, limit: 4 });

        brandGrid.style.opacity = '0.3';
        brandGrid.style.transform = 'translateY(10px)';
        brandGrid.style.transition = 'all 0.25s ease';

        setTimeout(() => {
          this.renderGrid(brandGrid, brandProducts, { colClass: 'col-xl-3 col-lg-4 col-md-6 mb-3' });
          brandGrid.style.opacity = '1';
          brandGrid.style.transform = 'translateY(0)';
        }, 150);
      });
    });
  }
};

// Initialize on DOM ready if in browser
if (typeof document !== 'undefined') {
  document.addEventListener('DOMContentLoaded', () => {
    TurtleProducts.init();
  });
}

// Node/CommonJS export for testing/tooling
if (typeof module !== 'undefined' && module.exports) {
  module.exports = { TURTLE_PRODUCTS, TurtleProducts };
}
