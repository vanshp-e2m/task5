# PixeSaaS — Figma Design Reference

> **Purpose:** This file is the offline source of truth for the Figma design.
> Figma MCP calls are rate-limited, so **do not re-query Figma** — everything needed
> to build this page is captured here and in the sibling raw dumps.
> Captured: **2026-09-12**.

## File identity

| | |
|---|---|
| URL | https://www.figma.com/design/iIdY9hopB7pXaSYpXkRMjq/Figma-demo-design--Copy- |
| `fileKey` | `iIdY9hopB7pXaSYpXkRMjq` |
| Page | `0:1` — "Page 1" (only page) |
| Root frame | `1:21` — "Home Page" |
| Canvas size | **1440 × 9412.5** px (desktop only — no mobile/tablet frames exist) |
| Total nodes | 4,039 |
| Product | **PixeSaaS** — fintech / SaaS marketing landing page |

### Files in this folder

| File | What it is |
|---|---|
| `FIGMA-REFERENCE.md` | This document — read this first |
| `raw-metadata.xml` | Full node tree: every id, name, x/y/w/h (505 KB, 4,039 nodes) |
| `raw-design-context.tsx.txt` | Figma's React+Tailwind reference code (100 KB) |
| `assets.tsv` | `assetName <TAB> original Figma URL` (URLs expire ~7 days from capture — **use the local files instead**) |
| `assets/` | **All 55 exported assets, downloaded locally** (4.0 MB) |

---

## Design tokens

These are real Figma variables — mirror them as CSS custom properties.

### Color

| Token | Hex | Notes |
|---|---|---|
| Black | `#000000` | Primary text, primary button fill, borders |
| White | `#ffffff` | Default section background |
| Grey | `#666666` | Secondary / body text |
| Border Color | `#C4C4C4` | Hairline borders, footer top rule |
| Grey Background | `#F9F9FB` | Alt section background (Container 11) |
| Green Background | `#f4fcda` | Accent card tint |
| Blue Background | `#e0f7fa` | Accent card tint |
| Pink Background | `#fef2f3` | Accent card tint |
| Yellow Background | `#fef7ca` | Accent card tint |
| Transparent | `#ffffff00` | Ghost / outline buttons |

Non-tokenised hexes that appear in the design (keep as literals):
`#ef1231` (red accent), `#ffd34e` / `#fbd550` (yellow), `#fff4d3`, `#042925` (dark green),
`#c9f269` (lime), `#12c64b` (green), `#3090c3` (blue).

### Typography

**Single family: `Inter`.** Every Figma text style has line-height `100`, exported as `normal`.

| Token | Size | Weight | Used for |
|---|---|---|---|
| Heading One | 76px | 500 Medium | Hero H1 only |
| Heading Two | 61px | 600 Semi Bold | Section headings (most common) |
| Heading Three | 49px | 500 Medium | Sub-headings, stat numbers |
| Heading Five | 31px | 400 Regular | Card titles |
| Heading Six | 25px | 500 Medium | Small card titles, prices |
| Text - 20px | 20px | 400 Regular | Button labels, lead paragraphs |
| Text - 18px | 18px | 400 Regular | Body |
| Captions - Footnotes | 16px | 400 Regular | Nav links, meta, footer (**most used**) |

Size frequency in the export: 16px(47), 25px(16), 61px(14), 20px(13), 18px(12), 10px(7), 13px(6), 49px(6), 31px(6), 76px(1).
Weight frequency: normal(84), medium(25), light(20), semibold(14).

### Layout & shape

- **Page gutter:** `padding-left/right: 160px` → content column is **1120px**.
- **Section rhythm:** `padding-top/bottom: 80px` is the default.
- **Radius scale:** `10px` (dominant — buttons, cards), `20px`, `56px` (pill), plus one-offs `15px`, `18px`, `13px`, `5px`.
- Layout is Figma auto-layout throughout → maps cleanly to flexbox.

---

## Component patterns

### Primary button (black fill)
```
background: var(--black); color: var(--white);
padding: 20px 0; border-radius: 10px;
font-size: 20px; font-weight: 400; text-align: center;
/* width is fixed per instance: nav "Get started" = 188px, hero "Book your card" = 223px */
```

### Secondary button (outline)
```
background: transparent; border: 1px solid var(--black); color: var(--black);
padding: 20px 0; border-radius: 10px; font-size: 20px;
/* hero "Our Features" = 202px wide */
```

### Text link (nav)
`font-size: 16px; color: var(--black); background: transparent;`

### Blog card
Image header `height: 250px`, `object-fit: cover`, `border-radius: 10px 10px 0 0`, `padding: 20px`,
with a black date badge overlaid on the image.

### Pricing card
`background: var(--white); border: 1px solid var(--black); border-radius: 10px;`
flex column, `gap: 29px`. A decorative illustration (`Card 01/02/03`, 309.5 × 196.5) overlaps
the card top via negative margin (`margin-bottom: -96px`).

---

## Section map (top → bottom)

All sections are full-width (1440) and `background: white` unless noted.

| # | Name | Node ID | Y | Height | Layout |
|---|---|---|---|---|---|
| 1 | Navbar | `1:22` | 0 | 144 | row, space-between, `padding: 40px 160px` |
| 2 | Container 02 — Hero | `1:44` | 144 | 436 | column, center, `gap: 30px`, `padding: 40px 0` |
| 3 | Container 03 — Hero visual | `1:52` | 580 | 780 | row, center, `padding-bottom: 80px`, overflow hidden |
| 4 | Container 04 — Features | `1:113` | 1360 | 650 | row, center, `gap: 58px`, `padding: 80px 0` |
| 5 | Container 05 — Reports / stats | `1:215` | 2010 | 650 | row, center, `gap: 96px`, `padding: 80px 0` |
| 6 | Container 06 — Global presence | `1:235` | 2660 | 1158 | column, center, `gap: 50px`, `padding: 80px 0` |
| 7 | Container 07 — Four steps | `1:3706` | 3818 | 1094 | column, center, `gap: 30px`, `padding: 80px 160px` |
| 8 | Container 08 — Pricing | `1:3749` | 4912 | 1095.5 | column, `gap: 55px`, `padding: 40px 160px 70px` |
| 9 | Container 09 — Testimonial | `1:3820` | 6007.5 | 734 | column, center, `gap: 90px`, `padding: 40px 160px` |
| 10 | Container 10 — Logo wall | `1:3841` | 6741.5 | 666 | column, center, `padding: 80px 160px` |
| 11 | Container 11 — Free trial CTA | `1:3852` | 7407.5 | 698 | row, center, `gap: 60px`, `padding: 80px 160px 0`, **bg `#f9f9fb`** |
| 12 | Blog Section | `1:3878` | 8105.5 | 827 | column, center, `gap: 50px`, `padding: 80px 0` |
| 13 | Footer | `1:3911` | 8932.5 | 400 | row, `gap: 100px`, `padding: 72px 0 71px`, **`border-top: 1px solid #c4c4c4`** |
| 14 | Content — copyright bar | `1:3951` | 9332.5 | 80 | row, center, `gap: 257px`, `padding: 29px 0`, **bg black** |

---

## Copy (verbatim, per section)

### 1. Navbar `1:22`
Logo wordmark **PixeSaaS** (mark = `assets/imgMaskGroup.svg`, 150.9 × 41.2, at x=160).
Nav: `Home` · `Services` · `Pricing` · `Career`.
Right: `Login` (text link) + `Get started` (black button).

### 2. Hero `1:44`
- **H1** (76px Medium, centered, width 1069): "Ensure the Well-being of Your Financial Planning"
- **Sub** (width 776): "PixeSaaS offers an intelligent solution that simplifies transactions while providing an enhanced chance to accumulate points across numerous locations."
- Buttons: `Book your card` (filled, 223px) · `Our Features` (outline, 202px)

### 3. Hero visual `1:52`
No text. Composite illustration built from 9 assets: `imgContainer`, `imgGroup1272630878`–`881`,
`imgFrame1272630865/866/867`, `imgMaskGroup1`.

### 4. Features `1:113`
Left = a mock banking-app UI card:
`Antonio L. Williams` · `Online` · `3h ago` · "Developing a banking experience that offers greater satisfaction." · `5` · `Expenses` · `Earnings` · `Sort by`

Transaction rows:
- `Spotify Subscription` / `Subscription` / `-$150.00` / `14 Sept 2024`
- `ATM Withdrawal` / `Cash Withdraw` / `+$233.00` / `10 Sept 2024`
- `KFC Restaurant` / `Food & Drink` / `-$88.00` / `09 Sept 2024`

Right column:
- Heading: "Finance with a Simple platform"
- "Manage your spending and save" — "Stay on top of your spending by tracking what's left after the bills are paid."
- "Easily view and manage your bills" — "See where money is coming in and how much is going out from your accounts."
- `Learn more`

### 5. Reports / stats `1:215`
- Heading (width 544): "Custom-made reports to make great decisions"
- Body: "We have considered our solutions to support every stage of your growth. We are the fastest and easiest way to launch SaaS."
- CTA: `Get started now`
- Stats: **20 %** "Increase in retention" · **1.5 X** "User base growth"
- Assets: `imgImage355`, `imgImage363`

### 6. Global presence `1:235`
- Heading (width 992): "Our presence spans across the globe to fulfill your Requirements."
- Stats row: **500+** "Outlet Services" · **4.8/5** "Customer Review" · **75.5k+** "Total Customer" · **10%** "Interest Rates"
- Asset: `imgObjects.svg` (world map — this section holds 3,482 nodes, nearly all map paths)

### 7. Four steps `1:3706`
- Heading (width 834): "Join Us in Four Simple Steps"
- Sub (width 667): "Trust plays a paramount role in establishing and maintaining strong relationships with customers."
- Step 1 — **Prepare Document**: "Gather your essentials; we're turning your vision into reality!" + `Learn more`
- Step 2 — **Make Account**: "Embark on your journey by creating your personalized account. It's just a click away!"
- Step 3 — **Card Activation**: "Activate the power of possibility! Secure your card for boundless experiences."
- Step 4 — **Enjoy!**: "Your gateway to seamless enjoyment is unlocked. Dive in and savor the moments!"

### 8. Pricing `1:3749`
- Heading (width 770): "Our Range of Service Level Options"
- Toggle: `Monthly` / `Annual` + `Save 20%` badge
- **Basic — $100 `/ per year`**: "Basic card processing." · "Online gateway integration." · "Low transaction charges."
- **Exclusive — $200**: "Multi-currency support." · "Advanced fraud prevention." · "Integration e-commerce platforms."
- **Premium — $300**: "Customized solutions." · "High-level security compliance." · "API access for integration."
- Shared blurb: "Individuals who earn their own income through employment and require digital financial services."
- Each card CTA: `Subscribe`
- Card art: `imgCard01/02/03.png`; tick bullets `imgVectorList01.svg` / `imgVectorList09.svg`

### 9. Testimonial `1:3820`
- Heading (width 726): "What Our Delighted Customer Shares"
- Quote (width 450): "Their personalized approach stood out to me. They took the time to assess my current fitness level, understand my objectives."
- Attribution: **Dean M. Nazario** — *Fitness Trainer*
- Assets: `imgImage338`, `imgImage339`, `imgVector6.svg`

### 10. Logo wall `1:3841`
- Single line (width 770): "Trusted by 2200+ digital brands."
- 8 brand logos: `imgImage340` … `imgImage347`

### 11. Free trial CTA `1:3852` (bg `#f9f9fb`)
- Heading (width 560): "Start your 14-days Free trial"
- Sub: "Bring your team together. No contracts, no commitments."
- Email field placeholder: `Your email address` + `Subscribe` button
- Footnotes: "No credit card required." · "Cancel anytime"
- Assets: `imgImage352`, `imgPngwing2.png`

### 12. Blog `1:3878`
- Heading (width 686, 61px Semi Bold): "Browse our Resources & Updates"
- Cards (image 250px tall, black date badge over the image):
  1. "Choosing the Right Payment Solution for Your Business" — `Sep 4, 2023` — `imgTopContent`
  2. "Secure Payment Solutions: Protecting Your Financial" — `March 8, 2023` — `imgTopContent1`
  3. "Mobile Payment Solutions: The Future of Transactions" — `March 25, 2023` — `imgTopContent2`
- Arrow icon: `imgButton.svg`

### 13. Footer `1:3911`
- CTA block (width 432): "Let's collect your card now." + `Apply now` button
- Column **Company**: `About` · `Blog` · `Careers` · `Pricing`
- Column **Contact Us**: `hello@pixesaas.com`
- 4 social icons, 36 × 36 each: `imgIcon01`…`imgIcon04` (nodes `1:3943`, `1:3945`, `1:3947`, `1:3949`)

### 14. Copyright bar `1:3951` (bg black)
"Copyright @ 2024 PixeSaaS, All right reserved." · `Customer Service` · `Terms & Conditions` · `Privacy Policy`

---

## Assets

All 55 exported assets live in `assets/`, named by the variable used in
`raw-design-context.tsx.txt` (e.g. `src={imgCard01}` → `assets/imgCard01.png`).

- **26 PNG** — photos, brand logos, UI mockups, card art
- **29 SVG** — icons, logo mark, world map, decorative vectors, tick bullets

When implementing: render every icon/image from its exported asset — do not redraw or
substitute. Preserve the designed outer box **and** the inner leaf dimensions (both are
recorded in `raw-metadata.xml`).

---

## Known gaps

1. **Design context truncated at 100,000 chars.** The tail of the last section (`1:3951`,
   copyright bar) is cut off mid-element in `raw-design-context.tsx.txt`. Its geometry and
   copy are fully captured in `raw-metadata.xml` and above, so nothing is actually lost.
2. **Desktop only.** There are no mobile or tablet frames in the file — responsive behaviour
   must be designed, not derived. Suggested approach: keep the 1120px content column, collapse
   the 160px gutter to ~24px below 768px, and stack every row-layout section.
3. **No Code Connect mappings and no component documentation** are attached to this file, so
   there is nothing to map to existing code components.
4. **Line-height is `100` on every text style**, exported as `normal`. For a real build prefer
   a sensible ratio (~1.2 headings / ~1.5 body) rather than copying `normal` literally.
5. **No screenshot was captured** — the call budget went to metadata + design context, which
   carry strictly more information. Node IDs above can render one later if needed.

## Implementation note

Target project is a **WordPress** install at `../` (`wp-content/themes/` currently holds only
the default Twenty Twenty-Three / Four / Five themes). Building this design means creating a
custom theme. The Tailwind classes in the reference dump are Figma's output, **not** this
project's stack — translate them to the theme's own CSS.

## If you must re-query Figma

```
fileKey: iIdY9hopB7pXaSYpXkRMjq
page:    0:1
root:    1:21
```
Query a single section node (see the table above) rather than the whole page — the full page
overflows both the metadata and design-context size limits.
