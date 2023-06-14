import {Html, Head, Main, NextScript} from 'next/document'

export default function Document() {
    return (
        <Html lang="en">
            <Head>
                <link rel="preconnect" href="https://fonts.googleapis.com"/>
                <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous"/>

                <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600&display=swap"
                      rel="stylesheet"/>

                <link rel="icon" href="/favicon.png" sizes="any" />
            </Head>
            <body>
            <Main/>
            <NextScript/>
            </body>
        </Html>
    )
}
