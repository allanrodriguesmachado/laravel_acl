import {Inter} from 'next/font/google'
import {GetStaticProps} from 'next'

const inter = Inter({subsets: ['latin']})

type Episodes = {
  id: string;
  title: string;
}

type HomeProps = {
    episodes: Episodes
}

export default function Home({episodes}: HomeProps) {
    {episodes.title}
    return <h1>Index</h1>
}

export  const  getStaticProps: GetStaticProps = async () => {
    const response = await fetch('http://localhost:3333/episodes')
    const data = await response.json()

    return {
        props: {
            episodes: data
        },
        revalidate: 60 * 60 * 8
    }
}